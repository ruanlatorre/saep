<?php
require_once('../configs/config.php');

if (!isset($_GET['id'])) {
    header("Location: home.php");
    exit();
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM produtos WHERE idprodutos = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$produto = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($stmt);

if (!$produto) {
    header("Location: home.php");
    exit();
}

$quantidade = (int)$produto['quantidade'];
$estoque_baixo = ($quantidade < 5);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Resumo do Produto</title>
</head>
<body>
    <?php include('../components/header.php'); ?>

    <main class="summary-container fade-in">
        <div class="summary-card">
            
            <div class="card-header">
                <h2>Resumo do Estoque</h2>
                <span class="badge <?php echo $estoque_baixo ? 'badge-warning' : 'badge-success'; ?>">
                    <?php echo $estoque_baixo ? 'Estoque Baixo' : 'Estoque Adequado'; ?>
                </span>
            </div>

            <div class="card-body">
                <div class="product-info">
                    <p><strong>Modelo:</strong> <?php echo htmlspecialchars($produto['modelo_produto']); ?></p>
                    <p><strong>Tipo:</strong> <?php echo htmlspecialchars($produto['tipo_produto']); ?></p>
                    <p><strong>Nº de Série:</strong> <?php echo htmlspecialchars($produto['numero_serie']); ?></p>
                </div>

                <div class="stock-info">
                    <h3>Quantidade Atual</h3>
                    <div class="stock-number <?php echo $estoque_baixo ? 'text-warning' : 'text-success'; ?>">
                        <?php echo $quantidade; ?>
                    </div>
                </div>
            </div>

            <?php if ($estoque_baixo): ?>
            <div class="alert alert-warning slide-up">
                ⚠️ <strong>Aviso:</strong> O estoque deste produto está abaixo do limite recomendado de 5 unidades. Considere registrar uma nova entrada em breve.
            </div>
            <?php else: ?>
            <div class="alert alert-success slide-up">
                ✅ <strong>Sucesso:</strong> Fluxo registrado! O estoque atual é suficiente.
            </div>
            <?php endif; ?>

            <div class="card-footer">
                <a href="flow_register.php" class="btn btn-outline">Novo Fluxo</a>
                <a href="home.php" class="btn btn-primary">Voltar para Home</a>
            </div>

        </div>
    </main>

    <script>
        // Animação com Intersection Observer (Conforme regra Premium Antigravity)
        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            const animatedElements = document.querySelectorAll('.fade-in, .slide-up');
            animatedElements.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
