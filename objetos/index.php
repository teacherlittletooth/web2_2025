<?php

//Importando o arquivo da classe
require_once "src/Produto.php";

//Instanciando classe (criando objeto)
$prod1 = new Produto();

//Inserindo dados por meio dos "setters"
$prod1->setNome("Papel higiênico");
$prod1->setValor(12.75);
$prod1->setQuantidade(6);

//Mostrando dados por meio dos "getters"
echo "Produto: " . $prod1->getNome() . "<br>";
echo "Valor: " . $prod1->getValor() . "<br>";
echo "Quantidade: " . $prod1->getQuantidade() . "<br>";

//Criando novo objeto (passando parâmetros para o construtor)
//Utilizando também o recurso de parâmetros nomeados
$prod2 = new Produto(valor: 8.50, nome: "Creme dental", quantidade: 2);

//Mostrando dados por meio do "toString"
echo $prod1;
echo $prod2;

var_dump($prod1);
echo "<br>";
var_dump($prod2);