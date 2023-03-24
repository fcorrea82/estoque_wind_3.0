<?php

namespace App\Controller;

use App\DAO\MarcaDAO;

class MarcaController extends Controller
{

    public static function cadastrar()
    {
        parent::isProtected();
        include PATH_VIEW . 'modulos/marca/cadastrar_marca.php';
    }

    public static function salvar()
    {
        parent::isProtected();

        $marca_dao = new MarcaDAO();

        $dados_para_salvar = array(
            'descricao' => $_POST["descricao"]
        );

        if (isset($_POST['id'])) {

            $dados_para_salvar['id'] = $_POST["id"];

            $marca_dao->update($dados_para_salvar);
        } else {
            $marca_dao->insert($dados_para_salvar);

            echo "Inserido.";
        }

        header("Location:/marca/listar");
    }

    public static function excluir()
    {
        parent::isProtected();
        if (isset($_GET['id'])) {
            $marca_dao = new MarcaDAO();
            $marca_dao->delete($_GET['id']);

            header("Location: /marca/listar");
        } else
            header("Location: /marca/listar");
    }

    //Index da Página
    public static function listarMarcas()
    {
        parent::isProtected();
        $marca_dao = new MarcaDAO();
        $listar_marcas = $marca_dao->getAllRows();
        $total_marcas = count($listar_marcas);

        include PATH_VIEW . 'modulos/marca/listar_marca.php';
    }

    public static function ver()
    {
        parent::isProtected();

        if (isset($_GET['id'])) {

            $marca_dao = new MarcaDAO();
            $dados_marca = $marca_dao->getById($_GET['id']);

            include PATH_VIEW . 'modulos/marca/cadastrar_marca.php';
        } else
            header("Location: /marca/listar");
    }
}
