<?php
require_once('configs/config.php');

$sql = "ALTER TABLE usuarios MODIFY idusuarios INT(11) NOT NULL AUTO_INCREMENT;";
if(mysqli_query($conexao, $sql)) {
    echo "Sucesso";
} else {
    echo "Erro: " . mysqli_error($conexao);
}
?>
