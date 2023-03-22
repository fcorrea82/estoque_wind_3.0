<?php

class CategoriaController extends Controller {

    public static function cadastrar()
    {
        parent::isProtected();
        include 'Views/modulos/categoria/cadastrar_categoria.php';
    }

    public static function salvar()
    {
        parent::isProtected();

        $categoria_dao = new CategoriaDAO();

        $dados_para_salvar = array(
            'descricao' => $_POST["descricao"]
        );

        if (isset($_POST['id'])) {

            $dados_para_salvar['id'] = $_POST["id"];

            $categoria_dao->update($dados_para_salvar);
            
        } else {
            $categoria_dao->insert($dados_para_salvar);

            echo "Inserido.";
        }

        header("Location:/categoria/listar");
    }

    public static function excluir()
    {
        parent::isProtected();
        if(isset($_GET['id']))
        {
           $categoria_dao = new CategoriaDAO();
           $categoria_dao->delete($_GET['id']);

           header("Location: /categoria/listar");
        } else
            header("Location: /categoria/listar");
    }

     //Index da Página
     public static function listarCategorias()
     {
        parent::isProtected();
         $categoria_dao = new CategoriaDAO();
         $listar_categorias = $categoria_dao->getAllRows();
         $total_categorias = count($listar_categorias);
 
         include 'Views/modulos/categoria/listar_categorias.php';
     }

     public static function ver()
    {
        parent::isProtected();
        
        if(isset($_GET['id']))
        {
            
            $categoria_dao = new CategoriaDAO();
            $dados_categoria = $categoria_dao->getById($_GET['id']);

            include 'Views/modulos/categoria/cadastrar_categoria.php';
        } else
            header("Location: /categoria/listar");
    }
}