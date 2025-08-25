<?php

//Recebendo dados do formulário
$email = $_POST["email"];
$pass = $_POST["pass"];

//Criando dados de referência
$email_salvo = "email@email.com";
$pass_salvo = "1234";

//Validação da entrada
if( $email == $email_salvo ) {
    if( $pass == $pass_salvo ) {
        echo "<h2> Seja bem vindo $email </h2>";
    } else {
        echo "<h2> Senha incorreta! </h2>";
    }
} else {
    echo "<h2> Email não cadastrado. </h2>";
}