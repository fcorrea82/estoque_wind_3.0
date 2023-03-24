<?php

namespace App\DAO;

/**
 * Classe que realiza busca de dados no banco para fornecer dados para o CRUD
 */

class ProdutoDAO extends DAO
{

    /**
     * Cria um novo objeto para fazer o CRUD de Produto
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna um registro específico da tabela Categoria
     */
    public function getById($id)
    {

        $stmt = $this->conexao->prepare("SELECT * FROM produto WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    /**
     * Retorna todos os registros da tabela categoria
     */

    public function getAllRows()
    {

        $stmt = $this->conexao->prepare("SELECT produto.id, produto.descricao, produto.preco, categoria.descricao as categoria, marca.descricao as marca
            FROM produto
            INNER JOIN categoria
            ON produto.id_categoria = categoria.id
            INNER JOIN marca
            ON produto.id_marca = marca.id");
        $stmt->execute();

        $arr_produtos = array();

        while ($c = $stmt->fetchObject())
            $arr_produtos[] = $c;

        return $arr_produtos;
    }

    /**
     * Método que insere na tabela categoria
     */

    public function insert($dados_produto)
    {

        $sql = "INSERT INTO produto (id_marca, id_categoria, descricao, preco) VALUES (?,?,?,?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_produto['id_marca']);
        $stmt->bindValue(2, $dados_produto['id_categoria']);
        $stmt->bindValue(3, $dados_produto['descricao']);
        $stmt->bindValue(4, $dados_produto['preco']);
        $stmt->execute();
    }

    /**
     * Atualiza uma registro na tabela Categoraia
     */
    public function update($dados_produto)
    {

        $sql = "UPDATE produto SET id_marca =?, id_categoria =?, descricao =?, preco =? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_produto['id_marca']);
        $stmt->bindValue(2, $dados_produto['id_categoria']);
        $stmt->bindValue(3, $dados_produto['descricao']);
        $stmt->bindValue(4, $dados_produto['preco']);
        $stmt->bindValue(5, $dados_produto['id']);
        $stmt->execute();
    }

    /**
     * Remove um registro da tabela Categoria
     */
    public function delete($id)
    {

        $sql = "DELETE FROM produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
