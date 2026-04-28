<?php
require_once('../configs/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome_usuarios, usuario, senha) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha);

        if (mysqli_stmt_execute($stmt)) {
            // Caminho corrigido para a raiz do projeto
            header("Location: ../index.php?success=true");
            exit();
        } else {
            // Mostra o erro se a execução falhar (ajuda a debugar)
            header("Location: ../views/register.php?success=false&error=" . mysqli_error($conexao));
            exit();
        }

        mysqli_stmt_close($stmt);
    }
}
?>