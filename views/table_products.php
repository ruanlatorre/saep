<?php
// Inclui o arquivo de conexão
require_once('../configs/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS mestre -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Lista de Produtos</title>
</head>

<body>
    <!-- Inclui o menu superior -->
    <?php include('../components/header.php'); ?>

    <main>
        <h2 style="text-align: center; margin-top: 20px;">Produtos Cadastrados</h2>
        
        <!-- Tabela que lista os produtos -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Modelo</th>
                    <th>Qtd</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Busca todos os produtos do banco de dados
                $sql = "SELECT * FROM produtos";
                $resultado = mysqli_query($conexao, $sql);

                // Laço de repetição para cada linha encontrada
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $linha['idprodutos'] . "</td>";
                    echo "<td>" . $linha['tipo_produto'] . "</td>";
                    echo "<td>" . $linha['modelo_produto'] . "</td>";
                    echo "<td>" . $linha['quantidade'] . "</td>";
                    echo "<td>R$ " . number_format($linha['preco'], 2, ',', '.') . "</td>";
                    echo "<td>
                            <!-- Links para editar ou excluir, passando o ID via URL (GET) -->
                            <a href='../controllers/edit_product.php?id=" . $linha['idprodutos'] . "' style='color: blue;'>Editar</a> | 
                            <a href='../controllers/delete_product.php?id=" . $linha['idprodutos'] . "' style='color: red;' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Botão para voltar para a Home -->
        <div style="display: flex; justify-content: center; margin-top: 30px; margin-bottom: 30px;">
            <a href="home.php" class="btn">Voltar para Home</a>
        </div>
    </main>
</body>

</html>