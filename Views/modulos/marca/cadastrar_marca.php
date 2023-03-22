<?php

session_start();

//verifica se o usuario esta logado
if(!isset($_SESSION["usuario_logado"]))
    header("Location: login.php");

try {

    if(isset($_GET['salvar']))
    {

      include '../../DAO/MarcaDAO.php';

      $marca_dao = new MarcaDAO();

      $dados_para_salvar= array(
        'descricao' => $_POST["descricao"]
      );

      if(isset($_POST['id'])){

      $dados_para_salvar['id'] = $_POST["id"];
      
      $marca_dao->update($dados_para_salvar);

      echo "Atualizado";

     }else {
        $marca_dao->insert($dados_para_salvar);
        echo "Inserido.";
        }

    }

    if(isset($_GET['excluir']))
    {
        include '../../DAO/MarcaDAO.php';

        $marca_dao = new MarcaDAO();

        $marca_dao->delete($_GET['id']);

        header("Location: listar_marca.php");

    }

    if(isset($_GET['id']))
    {
        include '../../DAO/MarcaDAO.php';

        $marca_dao = new MarcaDAO();

        $dados_marca = $marca_dao->getById($_GET['id']);

    }




} catch(Exception $e){
    echo $e->getMessage();
}

?>


<html lang="pt-br">
    <head>
        
        <title>CADASTRAR MARCA</title>        
        <meta charset="utf-8" />
        <?php include '../../includes/css_config.php' ?>
    </head>
    <body>
        <div id="global">
         
        <?php include '../../includes/cabecalho.php' ?>

               <main>

                <form method="post" action="cadastrar_marca.php?salvar=true">

                   <label>Descricao (Nome) da Marca:
                    <input name="descricao" value="<?= isset($dados_marca) ? $dados_marca->descricao : "" ?>" type="text" />
                   </label>

                    <?php if(isset($dados_marca)): ?>
                        <input name="id" type="hidden" value="<?= $dados_marca->id ?>" />
                    

                    <a href="cadastrar_marca.php?excluir=true&id=<?= $dados_marca->id ?>">
                        Excluir
                    </a>
                    <?php endif; ?>
                    <button type="submit">Salvar</button>
                </form>
            </main>

        
             
        </div>
        <?php include '../../includes/rodape.php' ?>
        <?php include '../../includes/js_config.php' ?>
    </body>
</html>