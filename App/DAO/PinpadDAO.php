<?php

namespace App\DAO;

/**
 * Classe que realiza busca de dados no banco para fornecer dados para o CRUD
 */
class PinpadDAO extends DAO
{


    /**
     * Cria um novo objeto para fazer o CRUD de Produto
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna um registro específico da tabela Pinpad
     * função que irá retornar os dados do banco e enviar para a controller na edição
     */

    public function getById($id)
    {
        // Recupera os dados do pinpad a ser editado do banco de dados
        $stmt = $this->conexao->prepare("SELECT * FROM pinpad WHERE id = ?");

        // Passa os dados do pinpad para a view de edição
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    /**
     * Retorna todos os registros da tabela categoria
     * retorna os valores no listar da view e usado no ver (edição)
     * SELECT p.id, p.descricao, p.preco, c.descricao AS categoria, m.descricao AS marca, pi.estoque, 
     *           pi.loja_entrada, date_format(pi.data_entrada,'%d/%m/%y') as data_entrada, pi.status_entrada, pi.loja_saida, 
     *          date_format(pi.data_saida, '%d/%m/%y') as data_saida, pi.status_saida
     *        FROM produto AS p
     *    INNER JOIN categoria AS c ON p.id_categoria = c.id
     *      INNER JOIN marca AS m ON p.id_marca = m.id
     *     INNER JOIN pinpad AS pi ON p.id = pi.id_produto
     *     ORDER BY m.descricao
           
        
     * ;
     */

    public function getAllRows()
    {

        $stmt = $this->conexao->prepare(
            "SELECT p.id, p.descricao, c.descricao AS categoria_descricao, m.descricao AS marca_descricao, pi.estoque, 
            pi.loja_entrada, date_format(pi.data_entrada,'%d/%m/%y') as data_entrada, pi.status_entrada, pi.loja_saida, 
            date_format(pi.data_saida, '%d/%m/%y') as data_saida, pi.status_saida, c.descricao AS categoria_descricao
            FROM produto AS p
            INNER JOIN categoria AS c ON p.id_categoria = c.id
            INNER JOIN marca AS m ON p.id_marca = m.id
            INNER JOIN pinpad AS pi ON p.id = pi.id_produto
            ORDER BY data_entrada DESC
           
        
        ;"
        );
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * Método que insere na tabela categoria
     */

    public function insert($dados_pinpad)
    {

        $sql = "INSERT INTO pinpad (id_produto, id_marca, id_categoria, loja_entrada, data_entrada, status_entrada, serie, 
        loja_saida, data_saida, status_saida, resp_saida) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_pinpad['id_produto']);
        $stmt->bindValue(2, $dados_pinpad['id_marca']);
        $stmt->bindValue(3, $dados_pinpad['id_categoria']);
        $stmt->bindValue(4, $dados_pinpad['loja_entrada']);
        $stmt->bindValue(5, $dados_pinpad['data_entrada']);
        $stmt->bindValue(6, $dados_pinpad['status_entrada']);
        $stmt->bindValue(7, $dados_pinpad['serie']);
        $stmt->bindValue(8, $dados_pinpad['loja_saida']);
        $stmt->bindValue(9, $dados_pinpad['data_saida']);
        $stmt->bindValue(10, $dados_pinpad['status_saida']);
        $stmt->bindValue(11, $dados_pinpad['resp_saida']);
        $stmt->execute();
    }

    /**
     * Atualiza uma registro na tabela Categoraia
     * verificar isso depois
     */
    public function update($dados_pinpad)
    {

        $sql = "UPDATE pinpad SET id_produto =?, id_marca =?, id_categoria =?, loja_entrada =?, 
        data_entrada =?, status_entrada =?, serie =?, loja_saida =?, data_saida =?, status_saida =?, 
        resp_saida =? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_pinpad['id_produto']);
        $stmt->bindValue(2, $dados_pinpad['id_marca']);
        $stmt->bindValue(3, $dados_pinpad['id_categoria']);
        $stmt->bindValue(4, $dados_pinpad['loja_entrada']);
        $stmt->bindValue(5, $dados_pinpad['data_entrada']);
        $stmt->bindValue(6, $dados_pinpad['status_entrada']);
        $stmt->bindValue(7, $dados_pinpad['serie']);
        $stmt->bindValue(8, $dados_pinpad['loja_saida']);
        $stmt->bindValue(9, $dados_pinpad['data_saida']);
        $stmt->bindValue(10, $dados_pinpad['status_saida']);
        $stmt->bindValue(11, $dados_pinpad['resp_saida']);
        $stmt->execute();
    }

    /**
     * Remove um registro da tabela Categoria
     */
    public function delete($id)
    {

        $sql = "DELETE FROM pinpad WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    /**
     * Nova função de teste para listagem
     */
}
