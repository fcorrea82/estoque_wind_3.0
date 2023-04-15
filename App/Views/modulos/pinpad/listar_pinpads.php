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
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require 'App/DAO/banco.php';
					$pdo = Banco::conectar();
					$sql = "SELECT p.id, p.descricao, c.descricao AS categoria_descricao, m.descricao AS marca_descricao, pi.estoque, 
					pi.loja_entrada, date_format(pi.data_entrada,'%d/%m/%y') as data_entrada, pi.status_entrada, pi.loja_saida, 
					date_format(pi.data_saida, '%d/%m/%y') as data_saida, pi.status_saida, c.descricao AS categoria_descricao
					FROM produto AS p
					INNER JOIN categoria AS c ON p.id_categoria = c.id
					INNER JOIN marca AS m ON p.id_marca = m.id
					INNER JOIN pinpad AS pi ON p.id = pi.id_produto
					ORDER BY data_entrada DESC";

					foreach ($pdo->query($sql) as $row) {

						echo '<tr>';

						echo '<td>' . $row['id'] . '</td>';
						echo '<td>' . $row['descricao'] . '</td>';
						echo '<th scope="row">' . $row['categoria_descricao'] . '</th>';
						echo '<th scope="row">' . $row['marca_descricao'] . '</th>';
						echo '<td>' . $row['loja_entrada'] . '</td>';
						echo '<td>' . $row['data_entrada'] . '</td>';
						echo '<td>' . $row['status_entrada'] . '</td>';
						echo '<td>' . $row['loja_saida'] . '</td>';
						echo '<td>' . $row['data_saida'] . '</td>';
						echo '<td>' . $row['status_saida'] . '</td>';

						echo '<td width=50>';

						echo '<div class="container">
	<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
		Ações
	  </button>
	  <ul class="dropdown-menu">
		<!--<li><a class="dropdown-item font-weight-bold" href="./pinpad/ver?id=<?= $listar_pinpads[$i]->id ?>' . $row['id'] . '">Mais Informações</a></li> -->
		<li><a class="dropdown-item font-weight-bold" href="/pinpad/ver?id=' . $row['id'] . '">Atualizar Cadastro</a></li>
		<!--<li><a class="dropdown-item font-weight-bold" href="../updates_saida/getnet_pinpad_update_saida.php?id=' . $row['id'] . '">Saída</a></li> -->
		<!--<li><hr class="dropdown-divider"></li> -->
		<!--<li><a class="dropdown-item font-weight-bold" href="../delete/getnet_pinpad_delete.php?id=' . $row['id'] . '">Excluir</a></li> -->
	  </ul>
	</div>';
						echo '</td>';
						echo '</tr>';
					}
					Banco::desconectar();
					?>
				</tbody>
			</table>
	</main>

	<?php include PATH_VIEW . 'includes/rodape.php' ?>
	<?php include PATH_VIEW . 'includes/js_config.php' ?>

</body>

</html>