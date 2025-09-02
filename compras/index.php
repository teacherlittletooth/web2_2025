<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de produtos</title>

    <style>
        #box {
            display: flex;
        }

        div {
            margin-right: 10px;
        }

        #btn-apaga {
            cursor: pointer;
            user-select: none;
            transition: 0.2s;
        }

        #btn-apaga:hover {
            text-shadow: 0px 0px 8px red;
            transition: 0.2s;
        }
    </style>
</head>
<body>
    <h1 style="color: grey;">Registro de produtos:</h1>

    <form action="add_produto.php" method="get">
        <div id="box">
            <div>
                <label for="produto">Produto:</label><br>
                <input type="text" name="produto" id="produto" required>
            </div>

            <div>
                <label for="unidade">Unidade:</label><br>
                <select name="unidade" id="unidade" required>
                    <option value=""></option>
                    <option value="pc">pç</option>
                    <option value="pct">pct</option>
                    <option value="kg">kg</option>
                    <option value="m">m</option>
                    <option value="l">l</option>
                </select>
            </div>

            <div>
                <label for="preco">Preço:</label><br>
                <input type="number" name="preco" id="preco" step="0.01" min="0.01" required>
            </div>
        </div>

        <hr>

        <input type="submit" value="Registrar produto">
        
    </form>
    
    <?php if( !isset( $_SESSION["produtos"] ) ) : ?>
        <blockquote>Nenhum produto cadastrado</blockquote>
    <?php else : ?>
        <h3>Lista de produtos:</h3>

        <table>
            <thead>
                <th>ITEM</th>
                <th>PRODUTO</th>
                <th>UN.</th>
                <th>PREÇO</th>
                <th></th>
            </thead>
            <tbody>
                <?php for( $i=0; $i < count($_SESSION["produtos"]); $i++ ) : ?>
                    <tr>
                        <td> <?= $i + 1 ?> </td>
                        <td> <?= $_SESSION["produtos"][$i]["produto"] ?> </td>
                        <td> <?= $_SESSION["produtos"][$i]["unidade"] ?> </td>
                        <td> <?= $_SESSION["produtos"][$i]["preco"] ?> </td>
                        <td id="btn-apaga" onclick='apagar(
                            "<?= $_SESSION["produtos"][$i]["produto"] ?>",
                            <?= $i ?>
                        )'> ❌ </td>
                    </tr>
                <?php endfor ?>
            </tbody>
        </table>

        
        <button onclick="apagarTudo()">Limpar lista de produtos</button>
    <?php endif ?>

    <script>
        function apagar(nome, id) {
            if( confirm("Excluir " + nome + "?") ) {
                window.location.href="apaga_item.php?id=" + id
            }
        }

        function apagarTudo() {
            if( confirm("Excluir todos os itens?") ) {
                window.location.href="limpa_lista.php"
            }
        }
    </script>

</body>
</html>