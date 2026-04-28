<?php
// ob_start() evita erros de redirecionamento (header) caso haja alguma saída de texto antes
ob_start();

// Inclui a conexão com o banco
require_once('../configs/config.php');

// Verifica se o ID do produto foi passado via URL (GET)
if (isset($_GET['id'])) {

    // Converte para inteiro por segurança
    $id = (int) $_GET['id'];

    // Prepara a query de exclusão
    $sql = "DELETE FROM produtos WHERE idprodutos = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        // Vincula o ID ao placeholder (?)
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Executa a exclusão
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            ob_end_clean();
            // Se der certo, volta para a lista de produtos
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
    // Se não houver ID, apenas volta para a tabela
    ob_end_clean();
    header('Location: ../views/table_products.php');
    exit();
}
ob_end_clean();
?>