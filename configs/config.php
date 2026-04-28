<?php
$local = 'localhost';
$user = 'root';
$password = '';
$database = 'saep_db';

$conexao = mysqli_connect($local, $user, $password, $database);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

?>