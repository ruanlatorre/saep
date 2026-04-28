<?php
// Inclui a conexão com o banco de dados
require_once('../configs/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Arquivo de estilos mestre -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Início - Sistema de Estoque</title>
</head>

<body>
    <!-- Inclui o cabeçalho (menu superior) -->
    <?php include('../components/header.php'); ?>

    <!-- O sistema de alertas (Toasts) é disparado pelo script.js via URL -->
    <!-- Ele detecta os parâmetros ?success=true ou ?alerta=estoque_baixo -->

    <!-- Container central com os botões de atalho -->
    <div class="div-buttons-home" style="display: flex; flex-direction: column; align-items: center; gap: 15px; margin-top: 50px;">
        
        <!-- Botão para ir para a tela de cadastro de produtos -->
        <a href="register_product.php" class="btn">Cadastrar Produto</a>

        <!-- Botão para registrar entradas ou saídas de estoque -->
        <a href="flow_register.php" class="btn">Entrada / Saída</a>

        <!-- Botão para ver a lista de todos os produtos -->
        <a href="table_products.php" class="btn">Lista de Produtos</a>

        <!-- Botão para ver o histórico de movimentações -->
        <a href="movement_history.php" class="btn">Histórico Completo</a>

    </div>
</body>

</html>