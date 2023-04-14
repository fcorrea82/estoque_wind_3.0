<html>

<head>
    <title>Cadastro de Pinpad</title>
    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
    <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

    <main class="container mt-4">
        <h4>Cadastro de Pinpad </h4>
        <form method="post" action="/pinpad/salvar">

            <!-- teste produto lista -->

            <fieldset class=" form-group border rounded col-md-12 bg-light">
                <legend class="form-label col-auto bg-light">Dados de Entrada: </legend>
                <div class="form-row">


                    <div class="form-group col-md-4">
                        <label for="id_produto"> Produto:</label>
                        <input readyonly id="id_produto" name="id_produto" class="form-control" type="text" value="<?= isset($dados_produto) ? $dados_produto->descricao : "" ?>" />
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_categoria"> Categoria:</label>
                        <input id="id_categoria" name="id_categoria" class="form-control" type="text" value="<?= isset($dados_categoria) ? $dados_categoria->descricao : "" ?>" />
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_marca"> Marca:</label>
                        <input id="id_marca" name="id_marca" class="form-control" type="text" value="<?= isset($dados_marca) ? $dados_marca->descricao : "" ?>" />
                    </div>



                </div>


                <div class="form-row">


                    <div class="form-group col-md-4">
                        <label for="loja_entrada"> Loja Entrada:</label>
                        <input id="loja_entrada" name="loja_entrada" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->loja_entrada : "" ?>" />
                    </div>

                    <div class="form-group col-md-4">
                        <label for="data_entrada"> Data Entrada:</label>
                        <input id="data_entrada" name="data_entrada" class="form-control" type="date" value="<?= isset($dados_pinpad) ? $dados_pinpad->data_entrada : "" ?>" />
                    </div>

                    <div class="form-group col-md-4">
                        <label for="status_entrada"> Status Entrada:</label>
                        <input id="status_entrada" name="status_entrada" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->status_entrada : "" ?>" />
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="serie"> Nº Série:</label>
                        <input id="serie" name="serie" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->serie : "" ?>" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="foto"> Foto:</label>
                        <input id="foto" name="foto" class="form-control-file" type="file" />
                    </div>

                </div>

            </fieldset>


            <fieldset class=" form-group border rounded col-md-12 bg-light">
                <legend class="form-label col-auto bg-light">Dados de Saída: </legend>
                <div class="form-row">



                    <div class="form-group col-md-6">
                        <label for="loja_saida"> Loja Saída:</label>
                        <input id="loja_saida" name="loja_saida" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->loja_saida : "" ?>" />
                    </div>

                    <div class="form-group col-md-3">
                        <label for="data_saida"> Data Saída:</label>
                        <input id="data_saida" name="data_saida" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->data_saida : "" ?>" onclick="this.type='date'" />
                    </div>

                    <div class="form-group col-md-3">
                        <label for="status_saida"> Status Saída:</label>
                        <input id="status_saida" name="status_saida" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->status_saida : "" ?>" />
                    </div>

                    <div class="form-group col-md-3">
                        <label for="resp_saida"> Responsável Saída:</label>
                        <input id="resp_saida" name="resp_saida" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->resp_saida : "" ?>" />
                    </div>







                </div>
            </fieldset>







            <?php if (isset($dados_produto)) : ?>
                <form action="/pinpad/excluir" method="POST">
                    <div class="btn-group" role="group">
                        <input name="id" type="hidden" value="<?= $dados_pinpad->id ?>" />
                        <button class="btn btn-outline-danger mr-1" type="button" onclick="confirmarExclusao()">Excluir</button>
                </form>

                <script>
                    function confirmarExclusao() {
                        if (confirm("Tem certeza de que deseja excluir este produto?")) {
                            // redirecionar para a página de exclusão
                            window.location.href = "/pinpad/excluir?id=<?= $dados_pinpad->id ?>";
                        }
                    }
                </script>


            <?php endif ?>




            <button type="submit" class="btn btn-outline-success mr-1">Salvar</button>
            <a href="/pinpad/listar" type="btn" class="btn btn-outline-primary">Voltar</a>
        </form>
    </main>

    <?php include PATH_VIEW . 'includes/rodape.php' ?>
    <?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>