<?php

namespace App\Controller;

use App\DAO\{ProdutoDAO, CategoriaDAO, MarcaDAO};

class ProdutoController extends Controller
{

    public static function cadastrar()
    {
        parent::isProtected();
        $categoria_dao = new CategoriaDAO();
        $listar_categorias = $categoria_dao->getAllRows();
        $total_categorias = count($listar_categorias);

        $marca_dao = new MarcaDAO();
        $listar_marcas = $marca_dao->getAllRows();
        $total_marcas = count($listar_marcas);

        include PATH_VIEW . 'modulos/produto/cadastrar_produto.php';
    }

    public static function salvar()
    {
        parent::isProtected();

        $produto_dao = new ProdutoDAO();

        $dados_para_salvar = array(
            'id_marca' => $_POST["id_marca"],
            'id_categoria' => $_POST["id_categoria"],
            'descricao' => $_POST["descricao"],
            'preco' => $_POST["preco"]
        );

        if (isset($_POST['id'])) {

            $dados_para_salvar['id'] = $_POST["id"];

            $produto_dao->update($dados_para_salvar);
        } else {
            $produto_dao->insert($dados_para_salvar);
        }

        header("Location:/produto/listar");
    }

    public static function excluir()
    {
        parent::isProtected();
        if (isset($_GET['id'])) {
            $produto_dao = new ProdutoDAO();
            $produto_dao->delete($_GET['id']);

            header("Location: /produto/listar");
        } else
            header("Location: /produto/listar");
    }

    //Index da Página
    public static function listarProdutos()
    {
        parent::isProtected();
        $produto_dao = new ProdutoDAO();
        $listar_produtos = $produto_dao->getAllRows();
        $total_produtos = count($listar_produtos);

        $categoria_dao = new CategoriaDAO();
        $listar_categorias = $categoria_dao->getAllRows();
        $total_categorias = count($listar_categorias);

        $marca_dao = new MarcaDAO();
        $listar_marcas = $marca_dao->getAllRows();
        $total_marcas = count($listar_marcas);

        include PATH_VIEW . 'modulos/produto/listar_produtos.php';
    }

    public static function ver()
    {
        parent::isProtected();
        if (isset($_GET['id'])) {

            $produto_dao = new ProdutoDAO();
            $dados_produto = $produto_dao->getById($_GET['id']);

            $categoria_dao = new CategoriaDAO();
            $listar_categorias = $categoria_dao->getAllRows();
            $total_categorias = count($listar_categorias);

            $marca_dao = new MarcaDAO();
            $listar_marcas = $marca_dao->getAllRows();
            $total_marcas = count($listar_marcas);

            include PATH_VIEW . 'modulos/produto/cadastrar_produto.php';
        } else
            header("Location: /produto/listar");
    }
}
