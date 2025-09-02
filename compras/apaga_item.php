<?php

//Inicializando a sessão nesta página
session_start();

//Capturando o "id" do elemento a ser excluído
$id = $_GET["id"];

//Excluindo índice recebido da lista
array_splice( $_SESSION["produtos"], $id, 1 );

//Redirecionando para a página inicial
header("location: index.php");