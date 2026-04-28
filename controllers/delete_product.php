<?php
ob_start();

require_once('../configs/config.php');

if (isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    $sql = "DELETE FROM produtos WHERE idprodutos = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            ob_end_clean();
            header('Location: ../views/table_products.php');
            exit();
        } else {
            echo "Erro ao excluir: " . mysqli_error($conexao);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da query: " . mysqli_error($conexao);
    }
} else {
    ob_end_clean();
    header('Location: ../views/table_products.php');
    exit();
}
ob_end_clean();
?>