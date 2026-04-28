<?php
// Inicia a sessão para podermos salvar dados do usuário
session_start();

// Inclui a conexão com o banco
require_once('../configs/config.php');

// Coleta os dados do formulário
$user = $_POST['usuario'];
$password = $_POST['senha'];

// Busca apenas pelo usuário (e-mail) primeiro
$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $user);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    
    // Se encontrar o usuário...
    if ($dados = mysqli_fetch_assoc($result)) {
        
        // Verifica se a senha digitada bate com o hash salvo no banco
        if (password_verify($password, $dados['senha'])) {
            
            // SALVA O NOME DO USUÁRIO NA SESSÃO
            $_SESSION['usuario_id'] = $dados['idusuarios'];
            $_SESSION['usuario_nome'] = $dados['nome_usuarios'];
            
            // Redireciona para a home
            header("Location: ../views/home.php");
            exit();
        }
    }
}

// Se chegar aqui, é porque o login falhou
header("Location: ../index.php?login=false");
exit();
?>