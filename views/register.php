<?php
require_once('../configs/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS unificado -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- JS para alertas e animações -->
    <script src="../assets/js/script.js" defer></script>
    <title>Cadastrar Usuário</title>
</head>

<body>
    <!-- Formulário de Cadastro -->
    <form action="../controllers/register.php" method="post">
        <h2>Criar Nova Conta</h2>
        
        <label for="nome">Nome Completo:</label>
        <input type="text" name="nome" id="nome" placeholder="Seu nome" required>
        
        <label for="email">E-mail (Usuário):</label>
        <input type="email" name="email" id="email" placeholder="seu@email.com" required>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" placeholder="Crie uma senha" required>
        
        <button type="submit">Finalizar Cadastro</button>
    </form>
    
    <!-- Link para voltar ao login -->
    <div style="text-align: center;">
        <a href="../index.php">Já tenho uma conta? Entrar agora</a>
    </div>
</body>

</html>