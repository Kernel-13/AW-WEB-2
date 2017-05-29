<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/upload-style.css">
	<title>Editar una Ilustración</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>

	<div class="container upload">

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
				<p> No se ha asignado ningun ID para borrar </p>
			</div>
			';
		}

		if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
			$id=$_GET['id'];
			$q = "SELECT * FROM posts WHERE post_id='$id' LIMIT 1";
			$resultado = $mysqli->query($q);

			if (mysqli_num_rows($resultado) == 1) {
				$post = $resultado->fetch_assoc();
				if ($post['post_owner'] == $_SESSION['user_id']) {
					$ok = TRUE;
				} else {
					echo '
					<div class="row section something-bad">
						<p> No puedes editar un post que no es tuyo </p>
					</div>
					';
				}
			} else {
				echo '
				<div class="row section something-bad">
					<p> No existe un post con el ID asignado </p>
				</div>
				';
			}

			if ($_SESSION['isAdmin'] == TRUE) {
				$ok = FALSE;
				echo '
				<div class="row section something-bad">
				<p> Los administradores no editar editar ningún tipo de Contenido. </p>
					<p> Solo pueden administrarlo. </p>
				</div>
				';
			}

		}


		if (isset($_POST['submit']) && $ok === TRUE) {

			$title = $post['post_title'];
			$description = $post['post_description'];
			$tags = $post['post_tags'];
			$path_pic = $post['post_illust'];


			if (isset($_POST['title']) && $_POST['title'] != "") {
				$title = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($_POST['title'])))));
			} else {
				$title = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($post['post_title'])))));
			}

			if (isset($_POST['description']) && $_POST['description'] != "") {
				$description = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($_POST['description'])))));
			} else {
				$description = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($post['post_description'])))));
			}

			if (isset($_POST['tags']) && $_POST['tags'] != "") {
				$tags = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($_POST['tags'])))));
			} else {
				$tags = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($post['post_tags'])))));
			}

			$q = "UPDATE posts SET post_title='$title', post_description='$description', post_tags='$tags' WHERE post_id='".$post['post_id']."'";

			// Si se guarda
			if ($mysqli->query($q) === TRUE) {
				echo '
				<div class="row section something-bad">
					<p> La Ilustración se ha modificado exitosamente! </p>
				</div>
				';
				echo $path_pic;
				header("Location: illust.php?id=".$post['post_id']."");

			// Si no se ha podido guardar
			} else {
				echo '
				<div class="row section something-bad">
					<p> La Ilustración no se ha podido guardar </p>
					<p> Por favor, intentalo de nuevo </p>
				</div>
				';
			}

		} elseif($ok === TRUE) {

			?>

			<div class="row">
				<form class="form-horizontal" method="post" action="">
					<div class="col-md-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3>Edita tu Ilustración</h3>
							</div>
							<div class="panel-body">
								<div class="row">

									<!-- Illust -->
									<div class="col-md-6 previsualizacion">
										<div class="col-lg-12">
											<h4>Ilustración que vas a modificar:</h4>
											<?php 
											echo '<img class="img-responsive img-rounded" src="'.$post['post_illust'].'" alt="Tu Ilustración"/>';
											?>
										</div>
									</div>

									<!-- Title, Description and Submit -->
									<div class="col-md-6 left-side">
										<div class="form-group">
											<div class="col-md-12">
												<label class="sr-only" for="Titulo">Titulo </label>
												<input class="form-control" type="text" id="Titulo" name="title" placeholder="Nuevo Titulo" maxlength="30">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<label class="sr-only" for="tags">Etiquetas </label>
												<input class="form-control" type="text" id="tags" name="tags" placeholder="Nuevas Etiquetas">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<label class="sr-only" for="descBox">Descripción </label>
												<textarea class="form-control" id="descBox" name="description" placeholder="Nueva Descripción" maxlength="500"></textarea>
											</div>
										</div>
										<!-- Submit Button -->
										<div class="row">
											<div class="col-lg-12">
												<div >
													<input class="btn btn-warning submitButton" type="submit" name="submit" value="Aplicar Cambios">
												</div>				
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php 
		} ?>
	</div>
</body>
</html>