<?php
session_start();

$result = "";
$status = 0;

if( 
    !isset($_SESSION["numero"]) &&
    !isset($_SESSION["contagem"])
    ) {
    $_SESSION["numero"] = rand(0, 5);
    $_SESSION["contagem"] = 0;
}

if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $numero = $_POST["num"];

    $status = 1;

    if( $numero == $_SESSION["numero"] ) {
        $result = "Acertou!";
    } else {
        $result = "Errou! Tente novamente";
        $_SESSION["contagem"]++;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivinhe!</title>
</head>
<body>
    <?php if( $status == 0 ) : ?>
        <h1>Adivinhe o número!</h1>
        <form action="#" method="post">
            <label for="num"> Escreva um número de 0 a 5: </label>
            <input type="number" name="num" id="num" min="0" max="5" placeholder="?" required>
            <br><br>
            <input type="submit" value="Verificar">
        </form>
    <?php 
        echo "<p> Tentativas: ";
        echo "<strong>". $_SESSION["contagem"] ."</strong> </p>";
        endif
    ?>
    <?php if( $status == 1 ) : ?>
        <h1> <?= $result ?> </h1>
        <button onclick="window.location.href='index.php'">Tentar novamente</button>
    <?php 
        endif;
        if( $result == "Acertou!" ) {
            session_destroy();
        }
    ?>
</body>
</html>