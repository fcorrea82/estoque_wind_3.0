<html>

<head>
	<title>Sistema de Estoque 3.0</title>
	<?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
	<?php include PATH_VIEW . 'includes/cabecalho.php' ?>


	<main class="container mt-4">

		<?php if (isset($_GET['excluido'])) : ?>
			<p>marca foi excluida!</p>
		<?php endif ?>

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
				<?php for ($i = 0; $i < $total_marcas; $i++) : ?>
					<tr>
						<th scope="row">
							<a href="/marca/ver?id=<?= $listar_marcas[$i]->id ?>">
								Abrir
							</a>
						</th>
						<td> <?= $listar_marcas[$i]->id ?> </td>
						<td> <?= $listar_marcas[$i]->descricao ?> </td>
					</tr>
				<?php endfor ?>
			</tbody>
		</table>
	</main>

	<?php include PATH_VIEW . 'includes/rodape.php' ?>
	<?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>