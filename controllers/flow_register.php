<?php
require_once('../configs/config.php');

// 1. Pega os dados do formulário
$fk_produto = $_POST['fk_produto'];
$tipo_fluxo = $_POST['tipo_fluxo'];
$fluxo_data = $_POST['fluxo_data'];
$quantidade = intval($_POST['quantidade']);

// 2. Valida quantidade
if ($quantidade <= 0) {
    header("Location: ../views/flow_register.php?success=false&erro=quantidade");
    exit();
}

// 3. Busca a quantidade atual do produto
$sql_produto = "SELECT quantidade FROM produtos WHERE idprodutos = ?";
$stmt_produto = mysqli_prepare($conexao, $sql_produto);
mysqli_stmt_bind_param($stmt_produto, "i", $fk_produto);
mysqli_stmt_execute($stmt_produto);
$resultado = mysqli_stmt_get_result($stmt_produto);
$produto = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($stmt_produto);

if (!$produto) {
    header("Location: ../views/flow_register.php?success=false&erro=produto");
    exit();
}

// 4. Calcula a nova quantidade baseado no tipo de fluxo
$quantidade_atual = intval($produto['quantidade']);
if ($tipo_fluxo == 'Entrada') {
    $nova_quantidade = $quantidade_atual + $quantidade;
} else if ($tipo_fluxo == 'Saída') {
    if ($quantidade_atual < $quantidade) {
        header("Location: ../views/flow_register.php?success=false&erro=insuficiente");
        exit();
    }
    $nova_quantidade = $quantidade_atual - $quantidade;
} else {
    header("Location: ../views/flow_register.php?success=false&erro=tipo");
    exit();
}

// 5. Inicia transação
mysqli_begin_transaction($conexao);

// 6. Insere no registro de entrada/saída
$sql_fluxo = "INSERT INTO entrada_saida (fk_produto, tipo_fluxo, fluxo_data, quantidade) VALUES (?, ?, ?, ?)";
$stmt_fluxo = mysqli_prepare($conexao, $sql_fluxo);
mysqli_stmt_bind_param($stmt_fluxo, "isss", $fk_produto, $tipo_fluxo, $fluxo_data, $quantidade);
mysqli_stmt_execute($stmt_fluxo);
mysqli_stmt_close($stmt_fluxo);

// 7. Atualiza a quantidade no estoque
$sql_update = "UPDATE produtos SET quantidade = ? WHERE idprodutos = ?";
$stmt_update = mysqli_prepare($conexao, $sql_update);
mysqli_stmt_bind_param($stmt_update, "ii", $nova_quantidade, $fk_produto);
mysqli_stmt_execute($stmt_update);
mysqli_stmt_close($stmt_update);

// 8. Commit da transação
mysqli_commit($conexao);

// 9. Redireciona para o resumo do produto após o fluxo
header("Location: ../views/product_summary.php?id=" . $fk_produto);
exit();
?>