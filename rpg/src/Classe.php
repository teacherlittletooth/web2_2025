<?php

class Classe {
    private $classe;
    private $caracteristicas;

    public function __construct(
        $classe = "Genérica",
        $caracteristicas = ""
    ) {
        $this->classe = $classe;
        $this->caracteristicas = $caracteristicas;
    }    

    public function getClasse()
    {
        return $this->classe;
    }

    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }

    public function setCaracteristicas($caracteristicas)
    {
        $this->caracteristicas = $caracteristicas;
    }
 
    public function __toString()
    {
        return "<hr>
                <ul>
                    <li>CLASSE: {$this->classe} </li>
                    <li>CARACTERÍSTICAS: {$this->caracteristicas} </li>
                </ul>";
    }
}