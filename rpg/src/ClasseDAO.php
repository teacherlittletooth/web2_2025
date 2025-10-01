<?php

//Importar arquivo
require_once "Conexao.php";

class ClasseDAO {
    private $con;
    private $table = "classes";
    private $id = "id_classe";

    //Função que retorna o objeto de conexão
    //com o banco de dados
    private function getCon() {
        $bd = new Conexao();
        $this->con = $bd->getMysqli();
        return $this->con;
    }

    //Função que recebe como parâmetro um objeto
    //da classe Classe e o distribui numa
    //query SQL para posterior execução no BD.
    public function salvar(Classe $classe)
    {
        //Criando a instrução SQL
        $sql = "INSERT INTO {$this->table}(classe, caracteristicas)
                VALUES(
                    '{$classe->getClasse()}',
                    '{$classe->getCaracteristicas()}'
                )";

        //Executando a instrução, e lançando a sua saída
        //em uma variável para posterior teste
        $status = $this->getCon()->query($sql);

        $this->getCon()->close();
        
        return $status;
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM {$this->table}";

        $lista = $this->getCon()->query($sql)->fetch_all();

        $this->getCon()->close();

        return $lista;
    }

    public function apagar($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->id} = $id";

        $result = $this->getCon()->query($sql);

        $this->getCon()->close();

        return $result;
    }

    public function editar(int $id, Classe $classe)
    {
        $sql = "UPDATE {$this->table} SET
                classe = '{$classe->getClasse()}',
                caracteristicas = '{$classe->getCaracteristicas()}' WHERE
                {$this->id} = $id";

        $status = $this->getCon()->query($sql);

        $this->getCon()->close();

        return $status;
    }
}
