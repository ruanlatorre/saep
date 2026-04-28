<?php
// Inclui o arquivo de configuração e conexão com o banco de dados
require_once('configs/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link para o CSS unificado -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Link para o script de animações e alertas -->
    <script src="assets/js/script.js" defer></script>
    <title>Página de Login</title>
</head>

<body>
    <!-- Formulário de Login -->
    <form action="auth/login.php" method="post">
        <h2>Entrar no Sistema</h2>
        
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuário" required>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
        
        <button type="submit">Entrar</button>
    </form>
    
    <!-- Link para a página de cadastro de novos usuários -->
    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <a href="views/register.php" class="btn" style="background-color: #6c757d;">Cadastrar Novo Usuário</a>
    </div>
</body>

</html>