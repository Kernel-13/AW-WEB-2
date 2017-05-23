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
	<link rel="stylesheet" type="text/css" href="css/upload-style.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/codigos.js" ></script>
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<?php 

	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
	} else {
		if ($_POST["submit"]) {

			$title = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["title"]))));
			$description = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["description"]))));
			$tags = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["tags"]))));

			$maxsize = 5297152;

			if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
				// Mensaje de ERROR -- Tamaño Excedido
			} else {
				$permitido = array('image/jpeg', 'image/png');

				if (in_array($_FILES["file"]["type"], $permitido)) {
					$query = "SELECT post_id FROM posts ORDER BY post_id DESC LIMIT 1"
					$resultado = mysqli_query($mysqli,$query) or die(mysql_error());

					$rows = mysqli_num_rows($resultado);
					$aux = $resultado->fetch_assoc();
					$post_id = $aux["post_id"];
					$post_id += 1;

					$info = pathinfo($_FILES["file"]["name"]);
					$extension = $info["extension"]; 
					$name = $post_id.".".$extension; 
					$path = 'img/posts/'.$_SESSION['username'].'/'.$name;
					move_uploaded_file( $_FILES['file']['tmp_name'], $path);

					$user_id = get_id_from_username($mysqli, $_SESSION['username']);

					$query2 = "INSERT INTO posts(post_type, post_owner, post_title, post_description, post_tags, post_illust) 
					VALUES('Picture', '$user_id', '$title', '$description', '$tags', '$path')"

					if ($mysqli->query($query2) === TRUE) {
						// OK
					} else {
						// SOMETHING WENT WRONG
					}

					/*
					
					list($width, $height) = getimagesize($path);
					$add = $width + $height;
					$sub = abs($width - $height);
					if ($sub > 10 || $width < 250 || $height < 250){
						// ERROR -- Las dimensiones de la imagen escogida son muy pequeñas, o la diferencia de las dimensiones pasa los 10 pixeles (No cuadrada)
					}

					*/

				} else {
					// Mensaje de ERROR -- No tiene una extension permitida
				}
			}
		}
	}
	?>

	<div class="container upload">
		<form class="form-horizontal" action="illust.php">
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
	</div>
</body>
</html>