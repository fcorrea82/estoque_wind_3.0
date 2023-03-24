<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>CADASTRAR CATEGORIA</title>        
        <?php include PATH_VIEW . 'includes/css_config.php' ?>
    </head>
    <body>
        <div id="global">
         
        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

               <main class="container mt-4">

               <h4>Cadastro de Categorias </h4>

                <form method="post" action="/categoria/salvar">

                <div class="form-group">
                   <label>Descricao (Nome) da categoria:
                        <input name="descricao" class="form-control" value="<?= isset($dados_categoria) ? $dados_categoria->descricao : "" ?>" type="text" />
                   </label>
                </div>

                    <?php if(isset($dados_categoria)): ?>
                        <input name="id" type="hidden" value="<?= $dados_categoria->id ?>" />
                    

                    <a href="/categoria/excluir?excluir=true&id=<?= $dados_categoria->id ?>" class="btn btn-outline-danger">
                        Excluir
                    </a>
                    <?php endif; ?>
                  
                    <button type="submit" class="btn btn-outline-success">Salvar</button>
                    <a href="/categoria/listar" type="btn" class="btn btn-outline-primary">Voltar</a>
                </form>
            </main>

        
             
        </div>
        <?php include PATH_VIEW . 'includes/rodape.php' ?>
        <?php include PATH_VIEW . 'includes/js_config.php' ?>
    </body>
</html>