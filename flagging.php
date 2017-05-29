<?php
session_start();
require('includes/db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/session-style.css">
	<title>Borrado</title>
</head>
<body>

	<?php require "includes/navbar.php"; ?>

	<div class="container-fluid login">
		<div class="row delete-class">
			<div class="col-lg-12">

				<?php 

				$ok = FALSE;
				$post = "";

				if (!isset($_SESSION['user_id'])) {
					echo '
					<div class="row section something-bad">
						<p> Debes estar registrado y haber iniciado sesión </p>
					</div>
					';
				} elseif (!isset($_GET['id'])) {
					echo '
					<div class="row section something-bad">
						<p> No se ha asignado ningun ID para marcar como ofensivo </p>
					</div>
					';
				} elseif (isset($_GET['id']) && isset($_SESSION['user_id'])) {

					$id=$_GET['id'];
					$query = "UPDATE posts SET post_flags = post_flags + 1 WHERE post_id = '".$id."'";

					if ($mysqli->query($query)) {

						$q = "SELECT * FROM posts WHERE post_id='$id' LIMIT 1";
						$resultado = $mysqli->query($q);

						$post = $resultado->fetch_assoc();
						if ($post['post_type'] == 'Song') {
							header("Location: song.php?id=".$post['post_id']."");
						} else {
							header("Location: illust.php?id=".$post['post_id']."");
						}
					} else {
						echo '
						<div class="row section something-bad">
							<p> No existe un post con el ID asignado </p>
						</div>
						';
					}
				}
				?>
			</div>
		</div>			
	</div>

	<?php 
	mysqli_close($mysqli);
	?>

	<!--

	PONER MYSQL CLOSE

	<a href="https://icons8.com/web-app/13114/Cancel">Cancel icon credits</a>
	<a href="https://icons8.com/web-app/13115/Ok">Ok icon credits</a>
-->
</body>
</html>