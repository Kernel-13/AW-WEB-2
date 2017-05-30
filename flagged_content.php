<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/flagged.css">
	<title>Contenido Ofensivo</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<div class="container">

		<?php

		if (isset($_SESSION["username"]) && $_SESSION["user_type"] == 'Admin'){

			$query = "SELECT * FROM posts WHERE post_flags>3 ORDER BY post_flags DESC";
			$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));;

			$rows = mysqli_num_rows($resultado);

			if ($rows < 1) {
				echo '
				<div class="row section something-bad">
					<h3> Ningún contenido ha sido marcado como ofensivo </h3>
				</div>
				';
			} else {
				echo '
				<div class="row section">
					<div class="col-md-12">
						<h2>Contenido Marcado como Ofensivo</h2>
						<table>
							<tr>
								<th>Tipo</th>
								<th>Titulo</th>
								<th>Autor</th>
								<th>Nº de Veces Marcado</th>
								<th>Opciones</th>
							</tr>
							';

							while ($post = $resultado->fetch_assoc()) {
								$user = get_user_from_id($mysqli, $post["post_owner"]);
								echo '
								<tr>
									<td>'.$post["post_type"].'</td>
									<td>'.$post["post_title"].'</td>
									<td><a href="user.php?id='.$user['user_id'].'">'.$user['user_name'].'</a></td>
									<td>'.$post["post_flags"].'</td>
									<td>
										<div>';

											if ($post["post_type"] == 'Song') {
												echo '<a class="btn btn-info" href="song.php?id='.$post["post_id"].'">Ir a Publicación</a><br>';
											} else {
												echo '<a class="btn btn-info" href="illust.php?id='.$post["post_id"].'">Ir a Publicación</a><br>';
											}
											
											echo 
											'<a class="btn btn-danger" href="delete.php?id='.$post["post_id"].'">Eliminar Publicación</a>
										</div>
									</td>
								</tr>
								';
							}

							echo '
						</table>
					</div>
				</div>
				';
			}

		} elseif (!isset($_SESSION["username"])) {
			echo '
			<div class="row section something-bad">
				<h3> Debes Iniciar Sesión o Registrarte para acceder a esta página! </h3>
			</div>
			';
		} elseif ($_SESSION["user_type"] != 'Admin') {
			echo '
			<div class="row section something-bad">
				<h3> Esta pagina solo esta disponible para los administradores </h3>
			</div>
			';
		}

		?>
	</div>
	<?php 
	mysqli_close($mysqli);
	?>
</body>
</html>