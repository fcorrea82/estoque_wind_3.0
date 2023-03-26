<?php

namespace App\DAO;

/**
 * Classe que realiza busca de dados no banco para fornecer dados para o CRUD
 */

class MarcaDAO extends DAO
{


    /**
     * Cria um novo objeto para fazer o CRUD de Marca
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna um registro específico da tabela Marca
     */
    public function getById($id)
    {

        $stmt = $this->conexao->prepare("SELECT * FROM marca WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    /**
     * Retorna todos os registros da tabela marca
     */

    public function getAllRows()
    {

        $stmt = $this->conexao->prepare("SELECT * FROM marca");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * Método que insere na tabela marca
     */

    public function insert($dados_marca)
    {

        $sql = "INSERT INTO marca (descricao) VALUES (?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_marca['descricao']);
        $stmt->execute();
    }

    /**
     * Atualiza uma registro na tabela Marca
     */
    public function update($dados_marca)
    {

        $sql = "UPDATE marca SET descricao =? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_marca['descricao']);
        $stmt->bindValue(2, $dados_marca['id']);
        $stmt->execute();
    }

    /**
     * Remove um registro da tabela Marca
     */
    public function delete($id)
    {

        $sql = "DELETE FROM marca WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
