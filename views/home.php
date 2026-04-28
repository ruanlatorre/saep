<?php
require_once('../configs/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <title>Home Page</title>
</head>

<body>
    <?php include('../components/header.php'); ?>

    <!-- Alerta de Sucesso e Estoque Baixo -->
    <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
        <div style="margin: 20px; padding: 15px; background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; color: #155724;">
            <strong>✓ Operação realizada com sucesso!</strong>
        </div>
    <?php endif; ?>

    <!-- Alerta de Estoque Baixo -->
    <?php if (isset($_GET['alerta']) && $_GET['alerta'] === 'estoque_baixo'): ?>
        <div style="margin: 20px; padding: 15px; background-color: #fff3cd; border: 1px solid #ffc107; border-radius: 5px; color: #856404;">
            <strong>⚠️ Aviso: Estoque Baixo!</strong>
            <p>O estoque do produto está baixo. Quantidade atual: <strong><?php echo intval($_GET['quantidade']); ?></strong> unidades.</p>
        </div>
    <?php endif; ?>

    <div class="div-buttons-home">
        <button>
            <a href="register_product.php">Cadastrar Produto</a>
        </button>

        <button>
            <a href="flow_register.php">Fluxo de Entrada e Saída</a>
        </button>

    </div>
</body>

</html>