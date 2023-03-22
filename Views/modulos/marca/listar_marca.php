<?php
try{
	include '../../DAO/MarcaDAO.php';
    $marca_dao = new MarcaDAO();
    $listar_marca = $marca_dao->getAllRows();
    $total_marca = count($listar_marca);

} catch(Exception $e){
	echo $e->getMessage();
}
?>
<html>
	<head>
		<title>Sistema de Estoque 3.0</title>
		<?php include '../../includes/css_config.php' ?>
	</head>
	<body>
		<?php include '../../includes/cabecalho.php' ?>


		<main class="container mt-4">




		
		<h4>Lista de Marcas </h4>

			<table class="table table-hover mt-4 ">
			<thead class="table-dark">
				<tr>
					<th>Ações</th>
					<th>ID</th>
					<th>Descrição:</th>
					
				</tr>
			</thead>
			<tbody>
				<?php for ($i=0; $i<$total_marca; $i++): ?>
				<tr>
					<th scope="row">
						<a href="cadastrar_marca.php?id=<?= $listar_marca[$i]->id ?>">
						Abrir
						</a>  
					</th>
					<td> <?= $listar_marca[$i]->id ?> </td>
					<td> <?= $listar_marca[$i]->descricao ?> </td>
				</tr>
				<?php endfor ?>	
			</tbody>
		</table>
		</main>

		<?php include '../../includes/rodape.php' ?>
		<?php include '../../includes/js_config.php' ?>

	</body>
</html>