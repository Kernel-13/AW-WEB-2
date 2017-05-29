<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<script type="text/javascript" src="js/codigos.js" ></script>
	<link rel="stylesheet" type="text/css" href="css/upload-style.css">
	<title>Editar una Canción</title>
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

			if (isset($_FILES['pic']) && !empty($_FILES["pic"]["name"])) {

				$maxsize = 5297152;
				$permitido = array('image/jpeg', 'image/png');

				// Si la imagen sobrepasa el tamaño limite
				if(($_FILES['pic']['size'] >= $maxsize) || ($_FILES["pic"]["size"] == 0)) {

					echo '
					<div class="row section something-bad">
						<p> El tamaño de la imagen escogida sobrepasa el tamaño maximo permitido (5 MB) </p>
						<p> O bien no tiene contenido (0 bytes) </p>
					</div>
					';

				// Si la imagen NO sobrepasa el tamaño limite
				} else {
					$filename = $_FILES['pic']['tmp_name'];
					list($width, $height) = getimagesize($filename);
					$sub = abs($width - $height);

					// Si la imagen NO es cuadrada
					if ($sub > 10 || $width < 250 || $height < 250){
						echo '
						<div class="row section something-bad">
							<p> La imagen escogida no es un cuadrada </p>
						</div>
						';

					// Si la imagen es cuadrada
					} else {

						// Si la imagen es jpeg o png
						if (in_array($_FILES["pic"]["type"], $permitido)) {


							$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1";
							$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
							$number = $resultado->fetch_assoc();

							if (is_null($number)) {
								$p_id=0;
							} else {
								$p_id=$number["post_id"]+1;
							}

							$info_pic = pathinfo($_FILES["pic"]["name"]);
							$extension_pic = $info_pic["extension"]; 

							$name_pic = $p_id.".".$extension_pic; 
							$path_pic = 'posts/'.$_SESSION["username"].'/music/'.$name_pic;

							if (!is_dir('posts/'.$_SESSION["username"].'/music')) {
								echo "UPS";
								mkdir('posts/'.$_SESSION["username"].'/music', 0777, true);
							}

							move_uploaded_file( $_FILES['pic']['tmp_name'], $path_pic);

						// Si la imagen NO es jpeg o png
						} else {
							echo '
							<div class="row section something-bad">
								<p> La imagen debe ser de formato JPEG o PNG </p>
							</div>
							';
						}
					}
				}						
			}

			echo $path_pic;

			$q = "UPDATE posts SET post_title='$title', post_description='$description', post_tags='$tags', post_illust='$path_pic' 
			WHERE post_id='".$post['post_id']."'";

			// Si se guarda
			if ($mysqli->query($q) === TRUE) {
				echo '
				<div class="row section something-bad">
					<p> La cancion se ha modificado exitosamente! </p>
				</div>
				';
				echo $path_pic;
				header("Location: song.php?id=".$post['post_id']."");

			// Si no se ha podido guardar
			} else {
				echo '
				<div class="row section something-bad">
					<p> La cancion no se ha podido guardar 11 </p>
					<p> Por favor, intentalo de nuevo </p>
				</div>
				';
			}

		} elseif($ok === TRUE) {

			?>

			<div class="row">
				<form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
					<div class="col-md-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3>Editando "<?php echo $post['post_title'] ?>"</h3>
							</div>
							<div class="panel-body">
								<div class="row">

									<!-- Cover Selection -->
									<div class="col-md-6 previsualizacion">
										<div class="col-lg-12">
											<div class="form-group">
												<div class="col-md-12">
													<label for="cover">Escoge un 'cover' (Imagen cuadrada)</label>
													<div class="new-input">
														<input id="cover" type="file" name="pic" accept="image/*" onchange="previewFile()">
													</div>
												</div>
												<div class="row section">
													<div class="col-lg-12">
														<img id="preview" class="img-responsive preview" src="img/preview.png" alt="Tu Ilustración"/>
													</div>
												</div>
											</div>
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
	<?php 
	mysqli_close($mysqli);
	?>
</body>
</html>