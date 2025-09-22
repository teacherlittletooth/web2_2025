<?php

//Importar arquivo
require_once "Conexao.php";

class PersonagemDAO {
    private $con;
    private $table = "personagens";
    private $id = "id_personagem";

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
        $sql = "INSERT INTO {$this->table}(nome, forca,
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

    public function listarTodos() {
        $sql = "SELECT * FROM {$this->table}";
        $lista = $this->getCon()->query($sql)->fetch_all();
        $this->getCon()->close();
        return $lista;
    }

    public function apagar($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->id} = $id";
        $status = $this->getCon()->query($sql);
        $this->getCon()->close();
        return $status;
    }
}