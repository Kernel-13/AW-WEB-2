<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/profile-view.css">
	<link rel="stylesheet" type="text/css" href="css/flagged.css">	
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<div class="container">

		<?php

		if (!isset($_SESSION["username"])){
			echo '
			<div class="row section something-bad">
				<h3> Debes Iniciar Sesión o Registrarte para acceder a esta página! </h3>
			</div>
			';
		} else {
			
			$titulo = 'Canciones';
			$tipo = 'Composer';

			if ($_SESSION["user_type"] == 'Composer') {
				$titulo = 'Canciones';
				$tipo = 'Song';
			} else {
				$titulo = 'Ilustraciones';
				$tipo = 'Picture';
			}

			echo '
			<div class="row section">
				<div class="col-md-12">
					<h2 class="title-header">Mis '.$titulo.' Subidas</h2>'
					;

					$i = $_SESSION['user_id'];
					$music_query = "SELECT * FROM posts WHERE post_owner='$i' AND post_type='$tipo' ORDER BY post_date";
					$music = $mysqli->query($music_query) or die ($mysqli->error. " en la línea ".(__LINE__-1));

					$rows = mysqli_num_rows($music);

					if ($rows > 0) {

						echo '
						<table>
							<tr>
								<th>Titulo</th>
								<th>Etiquetas</th>
								<th>Visitas</th>
								<th>Favoritos</th>
								<th>Ofensivo</th>
								<th>Ult. Modificación</th>
								<th>Opciones</th>
							</tr>
							';

							while ($post = $music->fetch_assoc()) {
								$user = get_user_from_id($mysqli, $post["post_owner"]);
								echo '
								<tr>';

									if ($tipo == 'Song') {
										echo '
										<td><a href="song.php?id='.$post["post_id"].'">'.$post["post_title"].'</a></td>
										';
									} else {
										echo '
										<td><a href="illust.php?id='.$post["post_id"].'">'.$post["post_title"].'</a></td>
										';
									}

									echo '
									<td>'.$post["post_tags"].'</td>
									<td>'.$post["post_views"].'</td>
									<td>'.$post["post_favourites"].'</td>
									<td>'.$post["post_flags"].'</td>
									<td>'.$post["post_date"].'</td>
									<td>
										<div>';

											if ($post["post_type"] == 'Song') {
												echo '<a class="btn btn-info" href="song.php?id='.$post["post_id"].'">Ir a Publicación</a>';
											} else {
												echo '<a class="btn btn-info" href="illust.php?id='.$post["post_id"].'">Ir a Publicación</a>';
											}
											
											echo 
											'
											<br>
											<a class="btn btn-danger" href="delete.php?id='.$post["post_id"].'">Eliminar Publicación</a>
										</div>
									</td>
								</tr>
								';
							}
							echo '
						</table>
					</div>
				</div>';
			} else {
				echo '
				<div class="row section something-bad">
					<p> No has subido nada por ahora </p>
				</div>
				';
			}

			echo '
		</div>
		';
	} 
	?>

</div>

<?php 
mysqli_close($mysqli);
?>
</div>
</body>
</html>