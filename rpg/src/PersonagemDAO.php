<?php

//Importar arquivo
require_once "Conexao.php";

class PersonagemDAO {
    private $con;

    //Função que retorna o objeto de conexão
    //com o banco de dados
    private function getCon() {
        $bd = new Conexao();
        $this->con = $bd->getMysqli();
        return $this->con;
    }

    //Função que recebe como parâmetro um objeto
    //da classe Personagem e o distribui numa
    //query SQL para posterior execução no BD.
    public function salvar(Personagem $personagem) {
        //Criando a instrução SQL
        $sql = "INSERT INTO personagens(nome, forca,
                agilidade, inteligencia)
                VALUES(
                    '{$personagem->getNome()}',
                    {$personagem->getForca()},
                    {$personagem->getAgilidade()},
                    {$personagem->getInteligencia()}
                )";

        //Executando a instrução, e lançando a sua saída
        //em uma variável para posterior teste
        $status = $this->getCon()->query($sql);

        $this->getCon()->close();
        
        return $status;
    }
}