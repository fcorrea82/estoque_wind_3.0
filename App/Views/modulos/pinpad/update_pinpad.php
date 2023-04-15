<?php

require '../DAO/banco.php';
require '../controller/mensageria.php';

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
        $sql = "UPDATE getnet  set gnet_loja = ?, gnet_serie = ?, gnet_status_ent = ?, gnet_estoque = ? WHERE getnet.id = ?";

        $q = $pdo->prepare($sql);

        $q->execute(array( 
                          $gnet_loja, 
                          $gnet_serie, 
                          $gnet_status_ent, 
                          $gnet_estoque, 
                       
                          $id));

        Banco::desconectar();

       header("Location: ../getnet.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM getnet where getnet.id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $gnet_loja = $data['gnet_loja'];
    $gnet_serie = $data['gnet_serie'];
    $gnet_status_ent = $data['gnet_status_ent'];
    $gnet_estoque = $data['gnet_estoque'];
    
    
   
    
    Banco::desconectar();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- using new bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Atualizar Entrada</title>
</head>

<body class="bg-image" style="background-image: url('../imagens/background_forms.png'); background-size: cover;">
    <?php echo mensageria_popup() ?>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header" style="background-color: #F6F3DD;">
                <h3 class="well"> Atualizar Getnet</h3>
            </div>

            <div class="card-body" style="background-color: #F4EFD4;">
                <form class="form-horizontal" action="../updates/getnet_update.php?id=<?php echo $id ?>" method="post">

                    <div class="form-row">

                <!-- inicio -->
                <div class="form-group col-md-6  ">
                <!--<label class="control-label font-weight-bold">Código:</label> -->
                        <div class="controls">
                            <input hidden size="50" class="form-control" readonly value="<?php echo $data['id_produto']; ?>">
                        </div>
                </div>

                <!-- fim -->

                   
 <!-- inicio -->
                <div class="form-group col-md-12  ">
                    <label class="control-label font-weight-bold">Produto:</label>
                        <div class="controls">
                            <input size="50" class="form-control shadow p-1 mb-1 bg-white rounded" readonly value="<?php echo $data['ent_prod_desc']; ?>">
                        </div>
                </div>

                <!-- fim -->  

                  

                     <!-- inicio -->
                    <div class="form-group col-md-12  <?php echo !empty($gnet_lojaErro) ? 'error ' : ''; ?>">
                        <label class="control-label font-weight-bold">Loja</label>
                        <div class="controls">
                            <input size="50" class="form-control text-uppercase shadow p-1 mb-1 bg-white rounded" name="gnet_loja" type="text" 
                                   value="<?php echo !empty($gnet_loja) ? $gnet_loja : ''; ?>">
                            <?php if (!empty($gnet_lojaErro)): ?>
                                <span class="text-danger"><?php echo $gnet_lojaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- fim -->

                   



                     <!-- inicio -->
                    <div class="form-group col-md-6  <?php echo !empty($gnet_serieErro) ? 'error ' : ''; ?>">
                        <label class="control-label font-weight-bold">Nº Série</label>
                        <div class="controls">
                            <input size="50" class="form-control text-uppercase shadow p-1 mb-1 bg-white rounded" name="gnet_serie" type="text" 
                                   value="<?php echo !empty($gnet_serie) ? $gnet_serie : ''; ?>">
                            <?php if (!empty($gnet_serieErro)): ?>
                                <span class="text-danger"><?php echo $gnet_serieErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- fim -->

                   

                       <!--TEMPORARIO -->

                         <!-- inicio -->
                    <div class="form-group col-md-6  <?php echo !empty($gnet_estoqueErro) ? 'error ' : ''; ?>">
                        <label class="control-label font-weight-bold">Em Estoque</label>
                        <div class="controls">

                            <select class="form-control shadow p-1 mb-1 bg-white rounded" name="gnet_estoque">
                                
                                <option value="SIM"selected>SIM</option>
                                <option value="NÃO" >NÃO</option>
                                
                                
                            </select>

                          
                        </div>
                    </div>

                    <!-- fim -->

                     <!-- inicio --> 
                    <div class="form-group col-md-12 <?php echo !empty($gnet_status_entErro) ? 'error' : ''; ?>">
                        <label class="control-label font-weight-bold">Status</label>
                        <div class="controls">
                            <input name="gnet_status_ent" class="form-control text-uppercase shadow p-1 mb-1 bg-white rounded" size="50" type="text" 
                                   value="<?php echo !empty($gnet_status_ent) ? $gnet_status_ent : ''; ?>">
                            <?php if (!empty($gnet_status_entErro)): ?>
                                <span class="text-danger"><?php echo $gnet_status_entErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                     <!-- fim -->

                                       

                </div>
                
                   
                   
                  

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-outline-secondary">Atualizar</button>
                        <a href="../getnet.php" type="btn" class="btn btn-outline-warning">Voltar</a>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
