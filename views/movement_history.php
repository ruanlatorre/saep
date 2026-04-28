<?php
require_once('../configs/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Usando o novo CSS unificado -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Histórico de Movimentações</title>
</head>

<body>
    <?php include('../components/header.php'); ?>

    <main>
        <h2 style="text-align: center; margin-top: 30px;">Histórico de Entradas e Saídas</h2>

        <table class="table-history">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Estoque Atual</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // SQL que junta a tabela de movimentação com a de produtos
                $sql = "SELECT es.*, p.modelo_produto, p.quantidade as estoque_atual 
                        FROM entrada_saida es 
                        JOIN produtos p ON es.fk_produto = p.idprodutos 
                        ORDER BY es.fluxo_data DESC";
                
                $resultado = mysqli_query($conexao, $sql);

                while ($mov = mysqli_fetch_assoc($resultado)) {
                    $isLow = ($mov['estoque_atual'] < 5);
                    $statusClass = $isLow ? 'bg-low' : 'bg-ok';
                    $statusText = $isLow ? 'Estoque Baixo' : 'Normal';
                    $rowClass = $isLow ? 'text-low' : '';

                    echo "<tr>";
                    echo "<td>" . date('d/m/Y', strtotime($mov['fluxo_data'])) . "</td>";
                    echo "<td>" . htmlspecialchars($mov['modelo_produto']) . "</td>";
                    echo "<td>" . htmlspecialchars($mov['tipo_fluxo']) . "</td>";
                    echo "<td>" . $mov['quantidade'] . "</td>";
                    echo "<td>" . $mov['estoque_atual'] . "</td>";
                    echo "<td><span class='badge $statusClass'>$statusText</span></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div style="text-align: center;">
            <a href="home.php" class="btn">Voltar para Home</a>
        </div>
    </main>
</body>

</html>
