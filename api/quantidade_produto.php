<?php
require_once('../configs/config.php');

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $sql = "SELECT quantidade FROM produtos WHERE idprodutos = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $produto = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);
    
    if ($produto) {
        echo json_encode([
            'success' => true,
            'quantidade' => intval($produto['quantidade'])
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Produto não encontrado'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'ID do produto não fornecido'
    ]);
}
?>
