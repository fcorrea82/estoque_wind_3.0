<html>

<head>
	<title>Listar Pinpad</title>
	<?php include PATH_VIEW . 'includes/css_config.php' ?>

</head>

<body>

	<?php include PATH_VIEW . 'includes/cabecalho.php' ?>

	<main class="container mt-4">
		<div class="row mb-3">
			<div class="col-md-12">
				<div class="d-flex align-items-center justify-content-between">
					<h4 class="m-0">Lista de Pinpads</h4>
					<div>
						<a href="/pinpad/cadastrar" type="btn" class="btn btn-outline-primary">Cadastrar</a>
					</div>
				</div>
			</div>
			<table class="table table-hover mt-4 ">
				<thead class="table-dark">
					<tr>
						<th>Ações</th>
						<th>ID</th>
						<th>Descrição:</th>
						<th>Categoria:</th>
						<th>Marca:</th>
						<th>Loja Entrada:</th>
						<th>Data Entrada:</th>
						<th>Status Entrada:</th>
						<th>Loja Saída:</th>
						<th>Data Saída:</th>
						<th>Status Saída:</th>


					</tr>
				</thead>
				<tbody>
					<?php for ($i <= 0; $i < $total_pinpads; $i++) : ?>
						<tr>
							<th scope="row">
								<a href="/pinpad/editar?id=<?= $listar_pinpads[$i]->id ?>">
									Editar
								</a>
								<a href="/pinpad/ver?id=<?= $listar_pinpads[$i]->id ?>">
									Ver
								</a>
							</th>
							<td> <?= $listar_pinpads[$i]->id ?> </td>
							<td> <?= $listar_produtos[$i]->descricao ?> </td>
							<td> <?= $listar_categorias[$i]->descricao ?> </td>
							<td> <?= $listar_marcas[$i]->id ?> </td>
							<td> <?= $listar_pinpads[$i]->loja_entrada ?> </td>
							<td> <?= $listar_pinpads[$i]->data_entrada ?> </td>
							<td> <?= $listar_pinpads[$i]->status_entrada ?> </td>
							<td> <?= $listar_pinpads[$i]->loja_saida ?> </td>
							<td> <?= $listar_pinpads[$i]->data_saida ?> </td>
							<td> <?= $listar_pinpads[$i]->status_saida ?> </td>
						</tr>
					<?php endfor ?>
				</tbody>
			</table>
	</main>

	<?php include PATH_VIEW . 'includes/rodape.php' ?>
	<?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>