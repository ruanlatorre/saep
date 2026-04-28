<?php
require_once('configs/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login Page</title>
</head>

<body>
    <form action="auth/login.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario">
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <br>
        <button type="submit">Entrar</button>
    </form>
    <a href="views/register.php">Não tenho uma conta</a>
</body>

</html>