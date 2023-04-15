<?php

require 'App/DAO/banco.php';
//require '../controller/mensageria.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: ../getnet.php");
}

if (!empty($_POST)) {

    $gnet_loja = null;
    $gnet_serie = null;
    $gnet_status_ent = null;
    $gnet_estoque = null;


    $gnet_loja = $_POST['gnet_loja'];
    $gnet_serie = $_POST['gnet_serie'];
    $gnet_status_ent = $_POST['gnet_status_ent'];
    $gnet_estoque = $_POST['gnet_estoque'];



    //Validação
    $validacao = true;


    if (empty($gnet_loja)) {
        $gnet_lojaErro = 'Por favor preencher campo';
        $validacao = false;
    }


    if (empty($gnet_serie)) {
        $gnet_serieErro = 'Por favor preencher campo';
        $validacao = false;
    }

    if (empty($gnet_status_ent)) {
        $gnet_status_entErro = 'Por favor preencher campo';
        $validacao = false;
    }

    if (empty($gnet_estoque)) {
        $gnet_estoqueErro = 'Por favor preencher campo';
        $validacao = false;
    }



    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE pinpad  set gnet_loja = ?, gnet_serie = ?, gnet_status_ent = ?, gnet_estoque = ? WHERE getnet.id = ?";

        $q = $pdo->prepare($sql);

        $q->execute(array(
            $gnet_loja,
            $gnet_serie,
            $gnet_status_ent,
            $gnet_estoque,

            $id
        ));

        Banco::desconectar();

        header("Location: ../getnet.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM pinpad where pinpad.id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $gnet_loja = $data['loja_entrada'];
    $gnet_serie = $data['data_entrada'];
    $gnet_status_ent = $data['status_entrada'];
    $gnet_estoque = $data['loja_saida'];




    Banco::desconectar();
}


?>

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


                    <!-- teste produto inicio 

                    <div class="form-group">
                        <label for="descricao"> Descrição (Nome) do Pinpad: </label>
                        <input name="descricao" id="descricao" class="form-control" type="text" required value="<?= isset($dados_produto) ? $dados_produto->descricao : "" ?>" />

                    </div>

                  teste produto fim -->

                    <div class="form-group col-md-6">
                        <label for="id_produto">Produto:</label>
                        <select id="id_produto" name="id_produto" class="form-control" required>
                            <option value="" selected>Selecione o produto</option>


                            <?php

                            $categorias_desejadas = array('PIN PAD'); // lista de categorias desejadas

                            // função de comparação para ordenar por marca
                            function compareByBrand($a, $b)
                            {
                                return strcmp($a->marca, $b->marca);
                            }

                            // filtrar os produtos pela categoria e ordenar por marca
                            $produtos_filtrados = array();
                            if (isset($listar_produtos)) {
                                $produtos_filtrados = array_filter($listar_produtos, function ($produto) use ($categorias_desejadas) {
                                    return in_array($produto->categoria, $categorias_desejadas);
                                });

                                usort($produtos_filtrados, 'compareByBrand');
                            }

                            if (!empty($produtos_filtrados)) {
                                foreach ($produtos_filtrados as $produto) :
                                    $selecionado = "";
                                    if (isset($dados_produto->id)) {
                                        $selecionado = ($produto->id == $dados_produto->id_produto) ? "selected" : "";
                                    }
                            ?>
                                    <option value="<?= $produto->id ?>" <?= $selecionado ?>>
                                        <?= $produto->descricao . ' - ' . $produto->categoria . ' - ' . $produto->marca ?>
                                    </option>
                            <?php endforeach;
                            } else {
                                echo "<option value=''>Nenhum produto encontrado</option>";
                            }

                            ?>


                        </select>
                    </div>


                    <div class="form-group col-md-3">
                        <label for="id_categoria">Categoria: </label>
                        <select id="id_categoria" name="id_categoria" class="form-control" required>
                            <option value="" selected>Selecione a categoria</option>

                            <?php

                            $categorias_desejadas = array('PIN PAD'); // lista de categorias desejadas
                            for ($i = 0; $i < $total_categorias; $i++) :
                                if (in_array($listar_categorias[$i]->descricao, $categorias_desejadas)) :
                                    $selecionado = "";
                                    if (isset($dados_produto->id)) {
                                        $selecionado = ($listar_categorias[$i]->id == $dados_produto->id_categoria) ? "selected" : "";
                                    }
                            ?>
                                    <option value="<?= $listar_categorias[$i]->id ?>" <?= $selecionado ?>>
                                        <?= $listar_categorias[$i]->descricao ?>
                                    </option>
                                <?php endif; ?>
                            <?php endfor ?>
                        </select>
                    </div>

                    <!-- teste marca inicio -->

                    <div class="form-group col-md-3">
                        <label for="id_marca">Marca:</label>
                        <select id="id_marca" name="id_marca" class="form-control" required>
                            <option value="" selected>Selecione a marca</option>
                            <?php foreach ($listar_marcas as $marca) :
                                $selecionado = "";
                                if (isset($dados_produto->id)) {
                                    $selecionado = ($marca->id == $dados_produto->id_marca) ? "selected" : "";
                                }
                            ?>
                                <option value="<?= $marca->id ?>" <?= $selecionado ?>>
                                    <?= $marca->descricao ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- teste marca fim -->

                    <!--   <div class="form-group col-md-3">
                        <label for="id_marca">Marca:</label>
                        <select id="id_marca" name="id_marca" class="form-control" required>
                            <option value="" selected>Selecione a marca</option>
                            <?php
                            $marcas_desejadas = array('CIELO', 'GETNET', 'REDE'); // lista de marcas desejadas

                            foreach ($listar_marcas as $marca) :
                                if (in_array($marca->descricao, $marcas_desejadas)) :
                                    $selecionado = "";
                                    if (isset($dados_produto->id)) {
                                        $selecionado = ($marca->id == $dados_produto->id_marca) ? "selected" : "";
                                    }
                            ?>
                                    <option value="<?= $marca->id ?>" <?= $selecionado ?>>
                                        <?= $marca->descricao ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach;  ?>
                        </select>
                    </div> -->



                </div>


                <div class="form-row">


                    <div class="form-group col-md-4">
                        <label for="loja_entrada"> Loja Entrada:</label>
                        <input required id="loja_entrada" name="loja_entrada" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->loja_entrada : "" ?>" />
                    </div>

                    <div class="form-group col-md-4">
                        <label for="data_entrada"> Data Entrada:</label>
                        <input required id="data_entrada" name="data_entrada" class="form-control" type="date" value="<?= isset($dados_pinpad) ? $dados_pinpad->data_entrada : "" ?>" />
                    </div>

                    <div class="form-group col-md-4">
                        <label for="status_entrada"> Status Entrada:</label>
                        <input required id="status_entrada" name="status_entrada" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->status_entrada : "" ?>" />
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="serie"> Nº Série:</label>
                        <input required id="serie" name="serie" class="form-control" type="text" value="<?= isset($dados_pinpad) ? $dados_pinpad->serie : "" ?>" />
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