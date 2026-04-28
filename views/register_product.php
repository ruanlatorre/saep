<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/register_product.css">
    <title>Cadastrar Produto</title>
</head>

<body>

    <?php include('../components/header.php'); ?>

    <div class="form-container">
        <h2>Cadastrar Produto</h2>

        <form action="../controllers/register_product.php" method="POST">

            <div class="form-group">
                <label>Tipo do Produto</label>
                <input type="text" name="tipo_produto" placeholder="Ex: Notebook" required>
            </div>

            <div class="form-group">
                <label>Modelo</label>
                <input type="text" name="modelo_produto" placeholder="Ex: Dell Inspiron 15" required>
            </div>

            <div class="form-group">
                <label>Número de Série</label>
                <input type="text" name="numero_serie" placeholder="Ex: SN123456" required>
            </div>

            <div class="form-group">
                <label>Data de Fabricação</label>
                <input type="date" name="data_fabricacao" required>
            </div>

            <div class="form-group">
                <label>Quantidade</label>
                <input type="number" name="quantidade" min="1" placeholder="Ex: 10" required>
            </div>

            <div class="form-group">
                <label>Preço (R$)</label>
                <input type="text" name="preco" placeholder="Ex: 2500.00" required>
            </div>

            <div class="form-group">
                <label>Foto (URL ou nome do arquivo)</label>
                <input type="file" name="foto_produto">
            </div>

            <button type="submit">Cadastrar Produto</button>

        </form>

        <button id="btn_list">
            <a href="../views/table_products.php">Ver produtos</a>
        </button>
    </div>

</body>

</html>