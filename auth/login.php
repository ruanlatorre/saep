<?php
require_once('../configs/config.php');

$user = $_POST['usuario'];
$password = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "ss", $user, $password);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        header("Location: ../views/home.php");
    } else {
        header("Location: ../../index.php?login=false");
    }
} else {
    header("Location: ../../index.php?login=false");
}
?>