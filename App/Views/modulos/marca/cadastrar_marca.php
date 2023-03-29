<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>CADASTRAR MARCA</title>
    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
    <div id="global">

        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

        <main class="container mt-4">

            <h4>Cadastro de Marcas </h4>

            <form method="post" action="/marca/salvar">

                <div class="form-group">
                    <label>Descricao (Nome) da marca:
                        <input name="descricao" class="form-control" value="<?= isset($dados_marca) ? $dados_marca->descricao : "" ?>" type="text" />
                    </label>
                </div>

                <?php if (isset($dados_marca)) : ?>
                    <form action="/marca/excluir" method="POST">
                        <div class="btn-group" role="group">
                            <input name="id" type="hidden" value="<?= $dados_marca->id ?>" />
                            <button class="btn btn-outline-danger mr-1" type="button" onclick="confirmarExclusao()">Excluir</button>
                    </form>

                    <script>
                        function confirmarExclusao() {
                            if (confirm("Tem certeza de que deseja excluir esta marca?")) {
                                // redirecionar para a página de exclusão
                                window.location.href = "/marca/excluir?id=<?= $dados_marca->id ?>";
                            }
                        }
                    </script>


                <?php endif ?>



                <button type="submit" class="btn btn-outline-success">Salvar</button>
                <a href="/marca/listar" type="btn" class="btn btn-outline-primary">Voltar</a>
            </form>
        </main>



    </div>
    <?php include PATH_VIEW . 'includes/rodape.php' ?>
    <?php include PATH_VIEW . 'includes/js_config.php' ?>
</body>

</html>