<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
	<link rel="stylesheet" type="text/css" href="css/flagged.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>

	<div class="container">

		<!-- Friends Activity -->
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
					<tr>
						<td>Ilustración</td>
						<td>Here Again</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>2</td>
						<td>
							<div>
								<a class="btn btn-info" href="illust.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Ilustración</td>
						<td>Once More</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>4</td>
						<td>
							<div>
								<a class="btn btn-info" href="illust.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Canción</td>
						<td>On Our Absolute One-Way Street</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>2</td>
						<td>
							<div>
								<a class="btn btn-info" href="song.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Canción</td>
						<td>Solar Sect of Mystic Wisdom</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>3</td>
						<td>
							<div>
								<a class="btn btn-info" href="song.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Ilustración</td>
						<td>Subterranean Stars</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>5</td>
						<td>
							<div>
								<a class="btn btn-info" href="illust.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Canción</td>
						<td>Artificial Sun</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>6</td>
						<td>
							<div>
								<a class="btn btn-info" href="song.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Ilustración</td>
						<td>Unreachable Moon</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>3</td>
						<td>
							<div>
								<a class="btn btn-info" href="illust.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Canción</td>
						<td>Blue Tears</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>4</td>
						<td>
							<div>
								<a class="btn btn-info" href="song.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Canción</td>
						<td>Red Blood</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>2</td>
						<td>
							<div>
								<a class="btn btn-info" href="song.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Ilustración</td>
						<td>Purple Night</td>
						<td><a href="user.php">KilloveFP</a></td>
						<td>1</td>
						<td>
							<div>
								<a class="btn btn-info" href="song.php">Ir a Publicación</a>
								<a class="btn btn-danger" href="#">Eliminar Publicación</a>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>