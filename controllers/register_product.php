<?php
require_once('../configs/config.php');

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tipo_produto = $_POST['tipo_produto'];
    $modelo_produto = $_POST['modelo_produto'];
    $numero_serie = $_POST['numero_serie'];
    $data_fabricacao = $_POST['data_fabricacao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $foto_produto = $_POST['foto_produto'];


    $sql = "INSERT INTO produtos (tipo_produto, modelo_produto, numero_serie, data_fabricacao, quantidade, preco, foto_produto) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "ssssiss", $tipo_produto, $modelo_produto, $numero_serie, $data_fabricacao, $quantidade, $preco, $foto_produto);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../views/home.php?sucess=true");
        } else {
            header("Location: ../views/register_product.php?sucess=false");
        }

        mysqli_stmt_close($stmt);
    }
}
?>