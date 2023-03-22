<?php

/**
 * Classe que realiza busca de dados no banco para fornecer dados para o CRUD
 */

class CategoriaDAO extends DAO {

    /**
     * Cria um novo objeto para fazer o CRUD de Categoria
     */

    public function __construct()
    {
        parent:: __construct();
        
    }

    /**
     * Retorna um registro específico da tabela Categoria
     */
    public function getById($id){

      $stmt = $this->conexao->prepare("SELECT * FROM categoria WHERE id = ?");
      $stmt->bindValue(1, $id);
      $stmt->execute();

      return $stmt->fetchObject();

    }

/**
 * Retorna todos os registros da tabela categoria
 */

public function getAllRows(){

       $stmt = $this->conexao->prepare("SELECT * FROM categoria");
       $stmt->execute();

       $arr_categorias = array();

       while($c = $stmt->fetchObject())
        $arr_categorias[] = $c;

       return $arr_categorias;

    }

 /**
 * Método que insere na tabela categoria
 */

    public function insert($dados_categoria){

        $sql = "INSERT INTO categoria (descricao) VALUES (?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_categoria['descricao']);
        $stmt->execute();

    }

    /**
     * Atualiza uma registro na tabela Categoraia
     */
    public function update($dados_categoria){

        $sql = "UPDATE categoria SET descricao =? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_categoria['descricao']);
        $stmt->bindValue(2, $dados_categoria['id']);
        $stmt->execute();

    }

    /**
     * Remove um registro da tabela Categoria
     */
    public function delete($id){

        $sql = "DELETE FROM categoria WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }

}


