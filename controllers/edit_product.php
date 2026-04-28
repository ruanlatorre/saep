<?php
require_once('../configs/config.php');

$produto = null;
$mensagem = '';

// Busca o produto pelo ID digitado
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE idprodutos = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
    $produto = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($stmt);
}

// Salva as alterações
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $tipo_produto = $_POST['tipo_produto'];
    $modelo_produto = $_POST['modelo_produto'];
    $numero_serie = $_POST['numero_serie'];
    $data_fabricacao = $_POST['data_fabricacao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    $sql = "UPDATE produtos SET tipo_produto=?, modelo_produto=?, numero_serie=?, data_fabricacao=?, quantidade=?, preco=? WHERE idprodutos=?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $tipo_produto, $modelo_produto, $numero_serie, $data_fabricacao, $preco, $quantidade, $id);

    if (mysqli_stmt_execute($stmt)) {
        $mensagem = '<p class="sucesso">Produto atualizado com sucesso!</p>';
        // Re-busca o produto atualizado
        $sql_select = "SELECT * FROM produtos WHERE idprodutos = ?";
        $stmt_select = mysqli_prepare($conexao, $sql_select);
        mysqli_stmt_bind_param($stmt_select, "i", $id);
        mysqli_stmt_execute($stmt_select);
        $resultado = mysqli_stmt_get_result($stmt_select);
        $produto = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt_select);
    } else {
        $mensagem = '<p class="erro">Erro ao atualizar.</p>';
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/editar_produto.css">
    <title>Editar Produto</title>
</head>

<body>

    <?php include('../components/header.php'); ?>

    <form method="GET" action="">
        <h2>Editar Produto</h2>

        <label>Digite o ID do Produto</label>
        <input type="number" name="id" placeholder="Ex: 1" required>

        <button type="submit">Buscar</button>
    </form>

    <!-- Se encontrou o produto, exibe o formulário de edição -->
    <?php if ($produto): ?>

        <?php echo $mensagem; ?>

        <form method="POST" action="">
            <h2>Editando:
                <?php echo $produto['modelo_produto']; ?>
            </h2>

            <!-- Campo oculto para guardar o ID -->
            <input type="hidden" name="id" value="<?php echo $produto['idprodutos']; ?>">

            <label>Tipo do Produto</label>
            <input type="text" name="tipo_produto" value="<?php echo $produto['tipo_produto']; ?>" required>

            <label>Modelo</label>
            <input type="text" name="modelo_produto" value="<?php echo $produto['modelo_produto']; ?>" required>

            <label>Número de Série</label>
            <input type="text" name="numero_serie" value="<?php echo $produto['numero_serie']; ?>" required>

            <label>Data de Fabricação</label>
            <input type="date" name="data_fabricacao" value="<?php echo $produto['data_fabricacao']; ?>" required>

            <label>Quantidade</label>
            <input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>" required>

            <label>Preço (R$)</label>
            <input type="text" name="preco" value="<?php echo $produto['preco']; ?>" required>

            <button type="submit">Salvar Alterações</button>
        </form>

    <?php elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id'])): ?>
        <p class="erro">Produto não encontrado.</p>
    <?php endif; ?>

</body>

</html>