<?php
//Inicializando sessão
session_start();

//Testando se já existe uma sessão
if( !isset( $_SESSION["rpg"] ) ) {
    $_SESSION["rpg"] = array();
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPG</title>
</head>
<body>
    <h1>Novo personagem</h1>

    <form action="#" method="post">
        <input type="text" name="nome" id="nome" placeholder="Nome do personagem" required>

        <br><br>

        <select name="classe" id="classe" required>
            <option value="">Selecione uma classe...</option>
            <option value="Mago">Mago</option>
            <option value="Orc">Orc</option>
            <option value="Paladino">Paladino</option>
            <option value="Ladino">Ladino</option>
            <option value="Guerreiro">Guerreiro</option>
        </select>

        <br><br>

        <label for="forca">Força:</label>
        <input type="range" name="forca" id="forca" min="1" max="30" step="1">

        <br><br>

        <label for="agilidade">Agilidade:</label>
        <input type="range" name="agilidade" id="agilidade" min="1" max="30" step="1">

        <br><br>

        <label for="inteligencia">Inteligência:</label>
        <input type="range" name="inteligencia" id="inteligencia" min="1" max="10" step="1">

        <br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>