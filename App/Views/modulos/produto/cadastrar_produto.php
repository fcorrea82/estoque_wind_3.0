<html>

<head>

    <title>Cadastro de Produtos</title>
    <?php include PATH_VIEW . 'includes/css_config.php' ?>

</head>

<body>

    <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

    <main class="container mt-4">
        <h4>Cadastro de Produtos </h4>
        <form method="post" action="/produto/salvar">

            <div class="form-group">
                <label for="descricao"> Descrição (Nome) do produto: </label>
                <input name="descricao" id="descricao" class="form-control" type="text" value="<?= isset($dados_produto) ? $dados_produto->descricao : "" ?>" />

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="preco"> Preço:</label>
                    <input id="preco" name="preco" class="form-control" type="number" value="<?= isset($dados_produto) ? $dados_produto->preco : "" ?>" />
                </div>

                <div class="form-group col-md-6">
                    <label for="foto"> Foto:</label>
                    <input id="foto" name="foto" class="form-control-file" type="file" />
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="id_categoria">Categoria: </label>
                    <select id="id_categoria" name="id_categoria" class="form-control">
                        <option>Selecione a categoria</option>

                        <?php

                        for ($i = 0; $i < $total_categorias; $i++) :

                            $selecionado = "";

                            if (isset($dados_produto->id)) {
                                $selecionado = ($listar_categorias[$i]->id == $dados_produto->id_categoria) ? "selected" : "";
                            }

                        ?>
                            <option value="<?= $listar_categorias[$i]->id ?>" <?= $selecionado ?>>
                                <?= $listar_categorias[$i]->descricao ?>
                            </option>
                        <?php endfor ?>

                    </select>
                </div>




                <div class="form-group col-md-6">
                    <label for="id_marca">Marca:</label>
                    <select id="id_marca" name="id_marca" class="form-control">
                        <option>Selecione a marca</option>

                        <?php for ($i = 0; $i < $total_marcas; $i++) :

                            if (isset($dados_produto->id))

                                $selecionado = ($listar_marcas[$i]->id == $dados_produto->id_marca) ? "selected" : "";

                        ?>
                            <option value="<?= $listar_marcas[$i]->id ?>" <?= $selecionado ?>>
                                <?= $listar_marcas[$i]->descricao ?>
                            </option>
                        <?php endfor ?>
                    </select>

                </div>

            </div>

            <?php if (isset($dados_produto)) : ?>
                <form action="/produto/excluir" method="POST">
                    <div class="btn-group" role="group">
                        <input name="id" type="hidden" value="<?= $dados_produto->id ?>" />
                        <button class="btn btn-outline-danger mr-1" type="button" onclick="confirmarExclusao()">Excluir</button>
                </form>

                <script>
                    function confirmarExclusao() {
                        if (confirm("Tem certeza de que deseja excluir este produto?")) {
                            // redirecionar para a página de exclusão
                            window.location.href = "/produto/excluir?id=<?= $dados_produto->id ?>";
                        }
                    }
                </script>


            <?php endif ?>




            <button type="submit" class="btn btn-outline-success">Salvar</button>
            <a href="/produto/listar" type="btn" class="btn btn-outline-primary">Voltar</a>
        </form>
    </main>

    <?php include PATH_VIEW . 'includes/rodape.php' ?>
    <?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>