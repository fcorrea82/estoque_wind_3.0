<html>

<head>
    <title>Sistema</title>
    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>

    <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

    <main class="container mt-3">

        <?php if (isset($_GET['excluido'])) : ?>
            <p>Grupo foi excluido!
            <p>
            <?php endif ?>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="m-0">Lista de Grupos de Usuários</h4>
                        <div>
                            <a href="/usuario/grupo/cadastrar" type="btn" class="btn btn-outline-primary">Cadastrar</a>
                        </div>
                    </div>
                </div>

                <table class="table table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Ações</th>
                            <th scope="col">Id</th>
                            <th scope="col-lg-9">Descrição:</th>
                            <th scope="col">Cadastrar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Listar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista_grupos as $g) : ?>
                            <tr>
                                <th scope="row">
                                    <a href="/usuario/grupo/ver?id=<?= $g->id ?>">
                                        Abrir
                                    </a>
                                </th>
                                <td> <?= $g->id ?> </td>
                                <td> <?= $g->descricao  ?> </td>
                                <td> <?= $g->cadastrar  ?> </td>
                                <td> <?= $g->editar  ?> </td>
                                <td> <?= $g->listar  ?> </td>
                                <td> <?= $g->excluir  ?> </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
    </main>

    <?php include PATH_VIEW . 'includes/rodape.php' ?>
    <?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>