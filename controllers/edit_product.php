<?php
/**
 * CONTROLLER: Edição de Produto
 * Este arquivo lida com a busca dos dados atuais e o salvamento das alterações.
 */
require_once('../configs/config.php');

$produto = null;
$mensagem = '';

// SEGURANÇA: Se não vier um ID pela URL (GET) e não for um envio de formulário (POST), volta para a lista
if ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET['id'])) {
    header('Location: ../views/table_products.php');
    exit();
}

// BUSCA DE DADOS: Se o método for GET, buscamos as informações atuais do produto no banco
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Usamos Prepared Statements (mysqli_prepare) para evitar SQL Injection
    $sql = "SELECT * FROM produtos WHERE idprodutos = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id); // "i" significa que o parâmetro é um inteiro (integer)
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
    $produto = mysqli_fetch_assoc($resultado); // Transforma o resultado em um array associativo

    mysqli_stmt_close($stmt);

    // Se o produto não existir no banco, volta para a tabela
    if (!$produto) {
        header('Location: ../views/table_products.php');
        exit();
    }
}

// SALVAMENTO: Se o método for POST, significa que o usuário clicou em "Salvar Alterações"
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tipo_produto = $_POST['tipo_produto'];
    $modelo_produto = $_POST['modelo_produto'];
    $numero_serie = $_POST['numero_serie'];
    $data_fabricacao = $_POST['data_fabricacao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    // Query de atualização usando Prepared Statements
    $sql = "UPDATE produtos SET tipo_produto=?, modelo_produto=?, numero_serie=?, data_fabricacao=?, quantidade=?, preco=? WHERE idprodutos=?";
    $stmt = mysqli_prepare($conexao, $sql);
    
    // Vinculamos os parâmetros: s = string, i = integer
    mysqli_stmt_bind_param($stmt, "ssssssi", $tipo_produto, $modelo_produto, $numero_serie, $data_fabricacao, $quantidade, $preco, $id);

    if (mysqli_stmt_execute($stmt)) {
        $mensagem = '<p class="sucesso">✓ Produto atualizado com sucesso!</p>';

        // Re-busca os dados atualizados para mostrar no formulário
        $sql_select = "SELECT * FROM produtos WHERE idprodutos = ?";
        $stmt_select = mysqli_prepare($conexao, $sql_select);
        mysqli_stmt_bind_param($stmt_select, "i", $id);
        mysqli_stmt_execute($stmt_select);
        $resultado = mysqli_stmt_get_result($stmt_select);
        $produto = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt_select);
    } else {
        $mensagem = '<p class="erro">❌ Erro ao atualizar: ' . mysqli_error($conexao) . '</p>';
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Editar Produto</title>
</head>

<body>

    <?php include('../components/header.php'); ?>

    <!-- Se encontramos o produto, mostramos o formulário de edição -->
    <?php if ($produto): ?>

        <?php echo $mensagem; ?>

        <form method="POST" action="">
            <h2>Editando: <?php echo htmlspecialchars($produto['modelo_produto']); ?></h2>

            <!-- Input invisível (hidden) para enviar o ID de volta pro servidor -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($produto['idprodutos']); ?>">

            <label>Tipo do Produto</label>
            <input type="text" name="tipo_produto" value="<?php echo htmlspecialchars($produto['tipo_produto']); ?>" required>

            <label>Modelo</label>
            <input type="text" name="modelo_produto" value="<?php echo htmlspecialchars($produto['modelo_produto']); ?>" required>

            <label>Número de Série</label>
            <input type="text" name="numero_serie" value="<?php echo htmlspecialchars($produto['numero_serie']); ?>" required>

            <label>Data de Fabricação</label>
            <input type="date" name="data_fabricacao" value="<?php echo htmlspecialchars($produto['data_fabricacao']); ?>" required>

            <label>Quantidade Atual</label>
            <input type="number" name="quantidade" value="<?php echo htmlspecialchars($produto['quantidade']); ?>" required>

            <label>Preço Unitário (R$)</label>
            <input type="text" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>

            <button type="submit">Salvar Alterações</button>
            <br><br>
            <a href="../views/table_products.php" class="btn">Voltar para a Lista</a>
        </form>

    <?php else: ?>
        <p style="text-align: center; margin-top: 50px;">Produto não encontrado.</p>
    <?php endif; ?>

</body>

</html>