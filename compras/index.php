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

        <a href="limpa_lista.php">Limpar lista de produtos</a>
    <?php endif ?>

</body>
</html>