<html>

<head>
    <title>Sistema</title>
    <?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>

    <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

    <main class="container mt-3">

        <?php if (isset($_GET['excluido'])) : ?>
            <p>Usuário foi excluido!
            <p>
            <?php endif ?>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="m-0">Lista de Usuários</h4>
                        <div>
                            <a href="/usuario/cadastrar" type="btn" class="btn btn-outline-primary">Cadastrar</a>
                        </div>
                    </div>
                </div>


                <table class="table table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Ações</th>
                            <th scope="col">Id</th>
                            <th scope="col-lg-6">Nome:</th>
                            <th scope="col-lg-6">Usuario:</th>
                            <th scope="col">Grupo:</th>
                            <th scope="col">Email:</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista_usuarios as $u) : ?>
                            <tr>
                                <th scope="row">
                                    <a href="/usuario/ver?id=<?= $u->id ?>">
                                        Abrir
                                    </a>
                                </th>
                                <td> <?= $u->id ?> </td>
                                <td> <?= $u->nome  ?> </td>
                                <td> <?= $u->usuario  ?> </td>
                                <td> <?= $u->grupo  ?> </td>
                                <td> <?= $u->email  ?> </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
    </main>

    <?php include PATH_VIEW . 'includes/rodape.php' ?>
    <?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>