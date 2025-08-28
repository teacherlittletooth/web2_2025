<?php

//Iniciando o controle de sessão
session_start();

//Recebendo os dados do formulário
$produto = $_GET["produto"];
$unidade = $_GET["unidade"];
$preco = $_GET["preco"];

//Caso não exista uma lista, a mesma é criada
if( !isset( $_SESSION["produtos"] ) ) {
    $_SESSION["produtos"] = array();
}

//Agrupando dados do formulário em um
//array associativo
$prod = [
    "produto" => $produto,
    "unidade" => $unidade,
    "preco"   => $preco
];

//Lançando o produto na lista
array_push( $_SESSION["produtos"], $prod );

//var_dump( $_SESSION["produtos"] );

//Redirecionando para a tela de cadastro
header( "location: index.php" );