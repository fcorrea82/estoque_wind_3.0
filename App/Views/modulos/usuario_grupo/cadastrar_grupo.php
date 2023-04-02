<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Cadastrar Grupo de Usuários</title>
    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
    <div id="global">

        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

        <main class="container mt-3">

            <h4>
                Cadastro de Grupo
            </h4>

            <form method="post" action="/usuario/grupo/salvar">

                <div class="form-group">
                    <label for="descricao">Descrição (Nome) do grupo: </label>
                    <input id="descricao" name="descricao" class="form-control" value="<?= isset($dados_grupo) ? $dados_grupo->descricao : "" ?>" type="text" />
                </div>

                <fieldset class="border rounded p-3 mb-3 bg-light">
                    <legend class="form-label col-auto bg-light">Permissões do Grupo</legend>

                    <div class="form-row">
                        <div class="form-group col-md-3">

                            <?php if (isset($dados_grupo) && $dados_grupo->cadastrar == 'S') : ?>
                                <input id="cadastrar" name="cadastrar" type="checkbox" checked />
                            <?php else : ?>
                                <input id="cadastrar" name="cadastrar" type="checkbox" />
                            <?php endif; ?>
                            <label for="cadastrar">Cadastrar </label>
                        </div>

                        <div class="form-group col-md-3">

                            <?php if (isset($dados_grupo) && $dados_grupo->editar == 'S') : ?>
                                <input id="editar" name="editar" type="checkbox" checked />
                            <?php else : ?>
                                <input id="editar" name="editar" type="checkbox" />
                            <?php endif; ?>

                            <label for="editar">Editar </label>
                        </div>

                        <div class="form-group col-md-3">

                            <?php if (isset($dados_grupo) && $dados_grupo->listar == 'S') : ?>
                                <input id="listar" name="listar" type="checkbox" checked />
                            <?php else : ?>
                                <input id="listar" name="listar" type="checkbox" />
                            <?php endif; ?>


                            <label for="listar">Listar </label>
                        </div>
                        <div class="form-group col-md-3">

                            <?php if (isset($dados_grupo) && $dados_grupo->excluir == 'S') : ?>
                                <input id="excluir" name="excluir" type="checkbox" checked />
                            <?php else : ?>
                                <input id="excluir" name="excluir" type="checkbox" />
                            <?php endif; ?>

                            <label for="excluir">Excluir </label>
                        </div>
                    </div>
                </fieldset>






                <?php if (isset($dados_grupo)) : ?>
                    <form action="/usuario/grupo/excluir" method="POST">
                        <div class="btn-group" role="group">
                            <input name="id" type="hidden" value="<?= $dados_grupo->id ?>" />
                            <button class="btn btn-outline-danger mr-1" type="button" onclick="confirmarExclusao()">Excluir</button>
                    </form>

                    <script>
                        function confirmarExclusao() {
                            if (confirm("Tem certeza de que deseja excluir este grupo?")) {
                                // redirecionar para a página de exclusão
                                window.location.href = "/usuario/grupo/excluir?id=<?= $dados_grupo->id ?>";
                            }
                        }
                    </script>


                <?php endif ?>



                <button type="submit" class="btn btn-outline-success mr-1">Salvar</button>
                <a href="/usuario/grupo" type="btn" class="btn btn-outline-primary">Voltar</a>
            </form>
        </main>

        <?php include PATH_VIEW . 'includes/rodape.php' ?>

        <?php include PATH_VIEW . 'includes/js_config.php' ?>

    </div>
</body>

</html>