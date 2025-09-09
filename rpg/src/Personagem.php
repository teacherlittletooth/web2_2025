<?php

class Personagem {
    private $nome;
    private $classe;
    private $forca;
    private $agilidade;
    private $inteligencia;

    public function __construct(
        $nome = "Personagem",
        $classe = "Genérica",
        $forca = 1,
        $agilidade = 1,
        $inteligencia = 1
    ) {
        $this->nome = $nome;
        $this->classe = $classe;
        $this->forca = $forca;
        $this->agilidade = $agilidade;
        $this->inteligencia = $inteligencia;
    }    

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getClasse()
    {
        return $this->classe;
    }

    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    public function getForca()
    {
        return $this->forca;
    }

    public function setForca($forca)
    {
        $this->forca = $forca;
    }
 
    public function getAgilidade()
    {
        return $this->agilidade;
    }

    public function setAgilidade($agilidade)
    {
        $this->agilidade = $agilidade;
    }

    public function getInteligencia()
    {
        return $this->inteligencia;
    }

    public function setInteligencia($inteligencia)
    {
        $this->inteligencia = $inteligencia;
    }

    public function atacar() {}

    public function defender() {}

    public function __toString()
    {
        return "<hr>
                <ul>
                    <li>NOME: {$this->nome} </li>
                    <li>CLASSE: {$this->classe} </li>
                    <li>FORÇA: {$this->forca} </li>
                    <li>AGILIDADE: {$this->agilidade} </li>
                    <li>INTELIGÊNCIA: {$this->inteligencia} </li>
                </ul>";
    }
}