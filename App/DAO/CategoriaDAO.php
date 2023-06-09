<?php

namespace App\DAO;

class CategoriaDAO extends DAO
{

    /**
     * Cria uma novo objeto para fazer o CRUD de Marcas.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Retorna um registro específico da tabela Marca.
     */
    public function getById($id)
    {

        $stmt = $this->conexao->prepare("SELECT * FROM categoria WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }


    /**
     * Retorna todos os registros da tabela Marca.
     */
    public function getAllRows()
    {

        $stmt = $this->conexao->prepare("SELECT * FROM categoria");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }



    /**
     * Método que insere uma categoria na tabela Marca.
     */
    public function insert($dados_categoria)
    {

        $sql = "INSERT INTO categoria (descricao) VALUES (?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_categoria['descricao']);
        $stmt->execute();
    }


    /**
     * Atualiza um registro na tabela Marca.
     */
    public function update($dados_categoria)
    {

        $sql = "UPDATE categoria SET descricao = ? WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_categoria['descricao']);
        $stmt->bindValue(2, $dados_categoria['id']);
        $stmt->execute();
    }


    /**
     * Remove um registro da tabela Marca.
     */
    public function delete($id)
    {

        $sql = "DELETE FROM categoria WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
