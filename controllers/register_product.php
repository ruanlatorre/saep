<?php
/**
 * CONTROLLER: Cadastro de Produto
 * Este arquivo recebe os dados do formulário e insere um novo produto no banco de dados.
 */
require_once('../configs/config.php');

$mensagem = '';

// Verifica se o formulário foi enviado (Método POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Coleta os dados enviados pelo formulário
    $tipo_produto = $_POST['tipo_produto'];
    $modelo_produto = $_POST['modelo_produto'];
    $numero_serie = $_POST['numero_serie'];
    $data_fabricacao = $_POST['data_fabricacao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $foto_produto = $_POST['foto_produto'];

    // SQL para inserir os dados no banco
    $sql = "INSERT INTO produtos (tipo_produto, modelo_produto, numero_serie, data_fabricacao, quantidade, preco, foto_produto) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepara a execução (Segurança contra SQL Injection)
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        // Vincula os valores (s=string, i=inteiro)
        mysqli_stmt_bind_param($stmt, "ssssiss", $tipo_produto, $modelo_produto, $numero_serie, $data_fabricacao, $quantidade, $preco, $foto_produto);

        // Se a execução der certo, redireciona para a home com mensagem de sucesso
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../views/home.php?success=true");
        } else {
            // Se der erro, redireciona de volta com aviso de erro
            header("Location: ../views/register_product.php?success=false");
        }

        // Fecha a declaração por boa prática
        mysqli_stmt_close($stmt);
    }
}
?>