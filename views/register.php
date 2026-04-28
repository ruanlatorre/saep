<?php
require_once('../configs/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>

<body>
    <form action="../controllers/register.php" method="post">
        <h1>Cadastrar Usuário</h1>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="../../index.php">Já tenho uma conta</a>
</body>

</html>