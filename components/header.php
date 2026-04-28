<?php
// Inicia a sessão se ela ainda não existir
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Pega o nome do usuário da sessão, ou usa "Visitante" se não estiver logado
$nome_exibicao = isset($_SESSION['usuario_nome']) ? $_SESSION['usuario_nome'] : "Visitante";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="../assets/js/script.js" defer></script>
    <title>Sistema de Estoque</title>
</head>

<body>
    <header>
        <div class="header-container">

            <!-- Saudação com nome do usuário dinâmico -->
            <div class="saudacao">
                <p>Bom dia,</p>
                <h2><?php echo htmlspecialchars($nome_exibicao); ?></h2>
            </div>

            <!-- Menu de navegação -->
            <nav>
                <ul>
                    <li><a href="../views/home.php">Home</a></li>
                    <li><a href="../views/register_product.php">Cadastrar Produto</a></li>
                    <li><a href="../views/flow_register.php">Fluxo de Entrada/Saída</a></li>
                    <li><a href="../views/movement_history.php">Histórico</a></li>
                    <li><a href="../auth/logout.php">Sair</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>