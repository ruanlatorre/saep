<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/table_products.css">
    <title>Tabela de Produtos</title>
</head>

<body>
    <?php include('../components/header.php'); ?>
    
    <table class="table-products">
        <thead>
            <tr>
                <td>Foto</td>
                <td>Tipo</td>
                <td>Modelo</td>
                <td>Serial</td>
                <td>Data de Fabricação</td>
                <td>Quantidade</td>
                <td>Preço</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../configs/config.php');

            $sql = "SELECT * FROM produtos";
            $resultado = mysqli_query($conexao, $sql);
            while ($produto = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $produto['foto_produto'] . "</td>";
                echo "<td>" . $produto['tipo_produto'] . "</td>";
                echo "<td>" . $produto['modelo_produto'] . "</td>";
                echo "<td>" . $produto['numero_serie'] . "</td>";
                echo "<td>" . $produto['data_fabricacao'] . "</td>";
                echo "<td>" . $produto['quantidade'] . "</td>";
                echo "<td>" . $produto['preco'] . "</td>";
                echo "<td>
                    <a href='../controllers/edit_product.php?id=" . $produto['idprodutos'] . "'>Editar</a> | 
                    <a href='../controllers/delete_product.php?id=" . $produto['idprodutos'] . "' onclick=\"return confirm('Tem certeza que deseja excluir este produto?')\">Excluir</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <button id="btn_back">
        <a href="home.php">Voltar</a>
    </button>
</body>

</html>