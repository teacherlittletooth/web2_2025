<?php

class Produto {
    //Atributos
    private $nome;
    private $valor;
    private $quantidade;

    //Métodos

    //Método construtor
    public function __construct($nome = null, $valor = 0.0, $quantidade = 0)
    {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->quantidade = $quantidade;
    }

    //Getters
    public function getNome() {
        return $this->nome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    //Setters
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    //Métodos auxiliares
    public function formatarDinheiro($valor) {
        return "R$ " . number_format( $valor, 2, "," );
    }

    public function calcularTotal() {
        return $this->formatarDinheiro(($this->quantidade * $this->valor));
    }

    //Método toString
    public function __toString()
    {
        return "*********************************<br>
                Produto: {$this->nome} <br>
                Valor: {$this->formatarDinheiro($this->valor)} <br>
                Quantidade: {$this->quantidade} <br>
                Total: {$this->calcularTotal()} <br>
                *********************************<br>";
    }
}