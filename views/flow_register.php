<?php
require_once('../configs/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/flow_register.css">
    <title>Entrada e Saída</title>
</head>

<body>

    <?php include('../components/header.php'); ?>

    <form action="../controllers/flow_register.php" method="POST">

        <h2>Registrar Fluxo</h2>

        <!-- Produto (busca do banco) -->
        <div>
            <label>Produto</label>
            <select name="fk_produto" required>
                <option value="">Selecione um produto</option>
                <?php
                // Busca todos os produtos para mostrar no select
                $sql = "SELECT idprodutos, modelo_produto FROM produtos";
                $resultado = mysqli_query($conexao, $sql);

                if ($resultado) {
                    while ($produto = mysqli_fetch_assoc($resultado)) {
                        echo '<option value="' . $produto['idprodutos'] . '">' . $produto['modelo_produto'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <!-- Tipo do fluxo: Entrada ou Saída -->
        <div>
            <label>Tipo do Fluxo</label>
            <select name="tipo_fluxo" required>
                <option value="">Selecione</option>
                <option value="Entrada">Entrada</option>
                <option value="Saída">Saída</option>
            </select>
        </div>

        <!-- Quantidade -->
        <div>
            <label>Quantidade</label>
            <input type="number" name="quantidade" min="1" placeholder="Ex: 5" required>
        </div>

        <!-- Data -->
        <div>
            <label>Data</label>
            <input type="date" name="fluxo_data" required>
        </div>

        <button type="submit">Registrar</button>

        <!-- Alerta de estoque baixo -->
        <div id="alerta-estoque"
            style="margin-top: 20px; padding: 15px; display: none; background-color: #fff3cd; border: 1px solid #ffc107; border-radius: 5px; color: #856404;">
            <strong>⚠️ Aviso de Estoque Baixo!</strong>
            <p id="mensagem-estoque"></p>
        </div>

    </form>

    <script>
        // Verifica alerta de estoque baixo na URL
        const params = new URLSearchParams(window.location.search);
        if (params.get('alerta') === 'estoque_baixo') {
            const quantidade = params.get('quantidade');
            const alertaDiv = document.getElementById('alerta-estoque');
            const mensagem = document.getElementById('mensagem-estoque');

            mensagem.textContent = `O estoque do produto está baixo. Quantidade atual: ${quantidade} unidades.`;
            alertaDiv.style.display = 'block';
        }

        // Valida quantidade do produto no select
        const selectProduto = document.querySelector('select[name="fk_produto"]');
        const inputQuantidade = document.querySelector('input[name="quantidade"]');
        const selectTipo = document.querySelector('select[name="tipo_fluxo"]');

        selectProduto.addEventListener('change', function () {
            if (this.value) {
                fetch('../api/get_produto_quantidade.php?id=' + this.value)
                    .then(response => response.json())
                    .then(data => {
                        if (data.quantidade < 5) {
                            console.warn('Produto com estoque baixo: ' + data.quantidade + ' unidades');
                        }
                    })
                    .catch(error => console.error('Erro:', error));
            }
        });

        // Valida quantidade de saída
        document.querySelector('form').addEventListener('submit', function (e) {
            if (selectTipo.value === 'Saída') {
                const quantidadeSaida = parseInt(inputQuantidade.value);
                const produtoId = selectProduto.value;

                if (produtoId && quantidadeSaida > 0) {
                    fetch('../api/get_produto_quantidade.php?id=' + produtoId)
                        .then(response => response.json())
                        .then(data => {
                            if (data.quantidade < quantidadeSaida) {
                                e.preventDefault();
                                alert('Quantidade de saída maior que o estoque disponível!\nEstoque: ' + data.quantidade + '\nSolicitado: ' + quantidadeSaida);
                            }
                        });
                }
            }
        });
    </script>

</body>

</html>