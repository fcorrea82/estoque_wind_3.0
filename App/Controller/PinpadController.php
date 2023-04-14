<?php

namespace App\Controller;

use App\DAO\{PinpadDAO, CategoriaDAO, MarcaDAO, ProdutoDAO};

class PinpadController extends Controller
{

    public static function cadastrar()
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

        include PATH_VIEW . 'modulos/pinpad/cadastrar_pinpad.php';
    }

    public static function salvar()
    {
        parent::isProtected();

        $pinpad_dao = new PinpadDAO();

        $dados_para_salvar = array(
            'id_produto' => $_POST["id_produto"],
            'id_categoria' => $_POST["id_categoria"],
            'id_marca' => $_POST["id_marca"],
            'loja_entrada' => $_POST["loja_entrada"],
            'data_entrada' => $_POST["data_entrada"],
            'status_entrada' => $_POST["status_entrada"],
            'serie' => $_POST["serie"],
            'loja_saida' => $_POST["loja_saida"],
            'data_saida' => $_POST["data_saida"],
            'status_saida' => $_POST["status_saida"],
            'resp_saida' => $_POST["resp_saida"]
        );

        if (isset($_POST['id'])) {

            $dados_para_salvar['id'] = $_POST["id"];

            $pinpad_dao->update($dados_para_salvar);
        } else {
            $pinpad_dao->insert($dados_para_salvar);

            echo "Inserido.";
        }

        header("Location:/pinpad/listar");
    }

    public static function excluir()
    {
        parent::isProtected();
        if (isset($_GET['id'])) {
            $pinpad_dao = new PinpadDAO();
            $pinpad_dao->delete($_GET['id']);

            //    header("Location: /pinpad/listar");
        } else
            header("Location: /pinpad/listar");
    }

    //Index da Página

    public static function listarPinpads()
    {
        parent::isProtected();
        $pinpad_dao = new PinpadDAO();
        $listar_pinpads = $pinpad_dao->getAllRows();
        $total_pinpads = count($listar_pinpads);

        $produto_dao = new ProdutoDAO();
        $listar_produtos = $produto_dao->getAllRows();
        $total_produtos = count($listar_produtos);

        $categoria_dao = new CategoriaDAO();
        $listar_categorias = $categoria_dao->getAllRows();
        $total_categorias = count($listar_categorias);

        $marca_dao = new MarcaDAO();
        $listar_marcas = $marca_dao->getAllRows();
        $total_marcas = count($listar_marcas);

        include PATH_VIEW . 'modulos/pinpad/listar_pinpads.php';
    }


    /**
     * campo de ações da View (abrir)
     * essa função é responsável pela a edição na view
     */
    public static function ver()
    {
        parent::isProtected();

        if (isset($_GET['id'])) {

            $pinpad_dao = new PinpadDAO();
            $dados_pinpad = $pinpad_dao->getById($_GET['id']);
            // $listar_pinpads = $pinpad_dao->getAllRows();
            //  $total_pinpads = count($listar_pinpads);

            $produto_dao = new ProdutoDAO();
            $dados_produto = $produto_dao->getById($_GET['id']);

            $categoria_dao = new CategoriaDAO();
            $dados_categoria = $categoria_dao->getById($_GET['id']);

            $marca_dao = new MarcaDAO();
            $dados_marca = $marca_dao->getById($_GET['id']);

            include PATH_VIEW . 'modulos/pinpad/cadastrar_pinpad.php';
        } else
            header("Location: /pinpad/listar");
    }

    public static function editar()
    {
        parent::isProtected();

        if (isset($_GET['id'])) {

            $pinpad_dao = new PinpadDAO();
            $dados_pinpad = $pinpad_dao->getById($_GET['id']);

            $produto_dao = new ProdutoDAO();
            $dados_produto = $produto_dao->getById($_GET['id']);

            $categoria_dao = new CategoriaDAO();
            $dados_categoria = $categoria_dao->getById($_GET['id']);

            $marca_dao = new MarcaDAO();
            $dados_marca = $marca_dao->getById($_GET['id']);

            include PATH_VIEW . 'modulos/pinpad/editar_pinpad.php';
        } else
            header("Location: /pinpad/listar");
    }
}
