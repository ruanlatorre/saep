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
            header("Location: ../../index.php?registro=sucesso");
            exit();
        } else {
            header("Location: ../views/register.php?registro=erro");
            exit();
        }

        mysqli_stmt_close($stmt);
    }
}
?>
