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
	<title>Subir una Ilustración</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<div class="container upload">

		<?php 
		$ok = 1;
		$post = "";

		if(isset($_SESSION['username'])){

			if ($_SESSION['isAdmin'] == TRUE) {
				$ok = FALSE;
				echo '
				<div class="row section something-bad">
					<p> Los administradores no pueden subir ningún tipo de Contenido. </p>
					<p> Solo pueden administrarlo. </p>
				</div>
				';
			}

			if ($_SESSION['user_type'] != 'Illustrator') {
				$ok = FALSE;

				echo '
				<div class="row section something-bad">
					<p> Solo puedes subir Música, no Ilustraciones </p>
				</div>
				';
			}
		} else {
			header("Location: login.php");
		}


		if (isset($_POST['submit']) && $ok == 1) {

			if ($_POST["submit"]) {

				$title = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["title"]))));
				$description = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["description"]))));
				$tags = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["tags"]))));

				$maxsize = 5297152;

				if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
					echo '
					<div class="row section something-bad">
						<p> El tamaño de la imagen sobrepasa los 5 MB </p>
						<p> Por favor, intentalo de nuevo </p>
					</div>
					';
				} else {
					$permitido = array('image/jpeg', 'image/png');

					if (in_array($_FILES["file"]["type"], $permitido)) {
						$query = "SELECT post_id FROM posts ORDER BY post_id DESC LIMIT 1";
						$resultado = mysqli_query($mysqli,$query) or die(mysql_error());

						$rows = mysqli_num_rows($resultado);
						$aux = $resultado->fetch_assoc();
						$post_id = $aux["post_id"];
						$post_id += 1;

						$info = pathinfo($_FILES["file"]["name"]);
						$extension = $info["extension"]; 
						$name = $post_id.".".$extension; 
						$path = 'posts/'.$_SESSION["username"].'/illust/'.$name;

						if (!is_dir('posts/'.$_SESSION["username"].'/illust')) {
							mkdir('posts/'.$_SESSION["username"].'/illust', 0777, true);
						}

						move_uploaded_file( $_FILES['file']['tmp_name'], $path);

						$user_id = $_SESSION['user_id'];

						$query2 = "INSERT INTO posts(post_type, post_owner, post_title, post_description, post_tags, post_illust) 
						VALUES('Picture', '$user_id', '$title', '$description', '$tags', '$path')";

						if ($mysqli->query($query2) === TRUE) {

							$q = "SELECT * FROM posts WHERE post_title='$title' aND post_views=0 AND post_owner='".$_SESSION["user_id"]."'";
							$resultado = $mysqli->query($q);

							if (mysqli_num_rows($resultado) == 1) {
								$post = $resultado->fetch_assoc();
								header("Location: illust.php?id=".$post['post_id']."");
							} else {
								echo '
								<div class="row section something-bad">
									<p> Algo ha interrumpido la subida del archivo </p>
									<p> Por favor, intentalo de nuevo </p>
								</div>
								';
							}

						} else {
							echo '
							<div class="row section something-bad">
								<p> Algo ha interrumpido la subida del archivo </p>
								<p> Por favor, intentalo de nuevo </p>
							</div>
							';
						}

					} else {
						echo '
						<div class="row section something-bad">
							<p> La imagen no es de tipo PNG o JPEG </p>
							<p> Por favor, intentalo de nuevo </p>
						</div>
						';
					}
				}
			}
		} elseif ($ok == 1) {
			?>

			<form class="form-horizontal" enctype="multipart/form-data" method="post" <?php echo 'action="'.$_SERVER['PHP_SELF'].'"'; ?>>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3>Sube aqui tu Ilustración</h3>
							</div>
							<div class="panel-body">
								<div class="row">

									<!-- File Inputs and Preview -->
									<div class="col-md-6" >
										<div class="form-group">
											<div class="col-md-12">
												<label for="cover">Selecciona la Ilustración que deseas subir</label>
												<div class="new-input">
													<input id="cover" type="file" name="file" required="required" accept="image/*" onchange="previewFile()">
												</div>
											</div>
										</div>
										<div class="row section">
											<div class="col-lg-12">
												<img id="preview" class="img-responsive preview" src="img/preview.png" alt="Tu Ilustración"/>
											</div>
										</div>
									</div>

									<!-- Title, Tags and Description -->
									<div class="col-md-6 left-side">
										<div class="form-group">
											<div class="col-md-12">
												<label class="sr-only" for="Titulo">Titulo </label>
												<input class="form-control" type="text" id="Titulo" name="title" required="required" placeholder="Titulo de la Ilustracion" maxlength="30">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<label class="sr-only" for="tags">Etiquetas </label>
												<input class="form-control" type="text" id="tags" name="tags" required="required" placeholder="Etiquetas (Separadas por comas)">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<label class="sr-only" for="descBox">Descripción </label>
												<textarea class="form-control" id="descBox" name="description" required="required" placeholder="Cuentanos algo sobre tu Ilustración" maxlength="500"></textarea>
											</div>
										</div>
									</div>
								</div>

								<!-- Submit Button -->
								<div class="row section">
									<div class="col-lg-12">
										<div >
											<input class="btn btn-warning submitButton" type="submit" name="submit" value="Subir Ilustración">
										</div>				
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<?php 
		} ?>
	</div>
	<?php 
	mysqli_close($mysqli);
	?>
</body>
</html>