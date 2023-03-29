<html>

<head>
	<title>Sistema de Estoque 3.0</title>
	<?php include PATH_VIEW . 'includes/css_config.php' ?>
</head>

<body>
	<?php include PATH_VIEW . 'includes/cabecalho.php' ?>


	<main class="container mt-3">

		<?php if (isset($_GET['excluido'])) : ?>
			<p>categoria foi excluida!</p>
		<?php endif ?>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="d-flex align-items-center justify-content-between">
					<h4 class="m-0">Lista de Categoria</h4>
					<div>
						<a href="/categoria/cadastrar" type="btn" class="btn btn-outline-primary">Cadastrar</a>
					</div>
				</div>
			</div>

			<table class="table table-hover mt-4 ">
				<thead class="table-dark">
					<tr>
						<th>Ações</th>
						<th>ID</th>
						<th>Descrição:</th>

					</tr>
				</thead>
				<tbody>
					<?php for ($i = 0; $i < $total_categorias; $i++) : ?>
						<tr>
							<th scope="row">
								<a href="/categoria/ver?id=<?= $listar_categorias[$i]->id ?>">
									Abrir
								</a>
							</th>
							<td> <?= $listar_categorias[$i]->id ?> </td>
							<td> <?= $listar_categorias[$i]->descricao ?> </td>
						</tr>
					<?php endfor ?>
				</tbody>
			</table>
	</main>

	<?php include PATH_VIEW . 'includes/rodape.php' ?>
	<?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>