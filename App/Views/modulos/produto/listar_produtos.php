<html>

<head>
	<title>Listar Produtos</title>
	<?php include PATH_VIEW . 'includes/css_config.php' ?>

</head>

<body>

	<?php include PATH_VIEW . 'includes/cabecalho.php' ?>

	<main class="container mt-4">
		<h4>Lista de Produtos</h4>
		<table class="table table-hover mt-4 ">
			<thead class="table-dark">
				<tr>
					<th>Ações</th>
					<th>ID</th>
					<th>Descrição:</th>
					<th>Categoria:</th>
					<th>Marca:</th>
					<th>Preço:</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($i = 0; $i < $total_produtos; $i++) : ?>
					<tr>
						<th scope="row">
							<a href="/produto/ver?id=<?= $listar_produtos[$i]->id ?>">
								Abrir
							</a>
						</th>
						<td> <?= $listar_produtos[$i]->id ?> </td>
						<td> <?= $listar_produtos[$i]->descricao ?> </td>
						<td> <?= $listar_produtos[$i]->categoria ?> </td>
						<td> <?= $listar_produtos[$i]->marca ?> </td>
						<td> <?= $listar_produtos[$i]->preco ?> </td>
					</tr>
				<?php endfor ?>
			</tbody>
		</table>
	</main>

	<?php include PATH_VIEW . 'includes/rodape.php' ?>
	<?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>