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
	<title>Subir una Canción</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<div class="container upload">
		<?php 

		$ok = TRUE;
		if(isset($_SESSION['username'])){
			$user_info = get_user_from_username($mysqli, $_SESSION['username']);
			if (is_null($user_info)) {
				$ok = FALSE;
			} else {

				if ($_SESSION['isAdmin'] == TRUE) {
					$ok = FALSE;
					echo '
					<div class="row section something-bad">
						<p> Los administradores no pueden subir ningún tipo de Contenido. </p>
						<p> Solo pueden administrarlo. </p>
					</div>
					';
				}

				if ($user_info["user_type"] != 'Composer') {
					$ok = FALSE;
					echo '
					<div class="row section something-bad">
						<p> Solo puedes subir Ilustraciones , no Música </p>
					</div>
					';
				}
			}
		} else {
			header("Location: login.php");
		}

		if (isset($_POST['submit']) && $ok === TRUE) {

			$title = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($_POST['title'])))));
			$description = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($_POST['description'])))));
			$tags = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($_POST['tags'])))));

			if (isset($_FILES['song'])) {

				//echo '<p> La cancion ha sido subida por FILES</p>';

				$formatos = array('audio/mpeg3', 'audio/mp3');

				// Si la cancion NO tiene formato permitido
				//echo $_FILES["song"]["type"];
				if (!in_array($_FILES["song"]["type"], $formatos)){
					echo '
					<div class="row section something-bad">
						<p> La cancion no es de tipo MP3 </p>
						<p> Por favor, intentalo de nuevo </p>
					</div>
					';


				// Si la cancion tiene formato permitido
				} else {

					$maxsize = 5297152;
					$formatos = array('audio/mpeg3');

					//echo '<p> La cancion es mp3 ok</p>';

					// Si la cancion NO sobrepasa el tamaño limite
					if(($_FILES['song']['size'] < $maxsize) || ($_FILES["song"]["size"] != 0)) {
						
						//echo '<p> La cancion es menor de 5mb ok</p>';


						$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1";
						$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
						$number = $resultado->fetch_assoc();

						if (is_null($number)) {
							$p_id=0;
						} else {
							$p_id=$number["post_id"]+1;
						}

						$info_song = pathinfo($_FILES["song"]["name"]);
						$extension_song = $info_song["extension"]; 

						$name_song = $p_id.".".$extension_song; 
						$path_song = 'posts/'.$_SESSION["username"].'/music/'.$name_song;

						//echo '<p> PRobando creacion ruta </p>';


						if (!is_dir('posts/'.$_SESSION["username"].'/music')) {
							mkdir('posts/'.$_SESSION["username"].'/music', 0777, true);
						}

						move_uploaded_file( $_FILES['song']['tmp_name'], $path_song);

						//echo '<p> ruta ok </p>';


						$query2 = "INSERT INTO posts(post_type, post_owner, post_title, post_description, post_tags, post_song, post_illust, post_views, post_favourites, post_flags)
						VALUES ('Song', '".$_SESSION["user_id"]."', '$title', '$description', '$tags', '$path_song', '', 0, 0, 0)";				

						// Si se ha subido una imagen
						if (isset($_FILES['pic'])) {

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

										$info_pic = pathinfo($_FILES["pic"]["name"]);
										$extension_pic = $info_pic["extension"]; 

										$name_pic = $p_id.".".$extension_pic; 
										$path_pic = 'posts/'.$_SESSION["username"].'/music/'.$name_pic;

										if (!is_dir('posts/'.$_SESSION["username"].'/music')) {
											echo "UPS";
											mkdir('posts/'.$_SESSION["username"].'/music', 0777, true);
										}

										move_uploaded_file( $_FILES['pic']['tmp_name'], $path_pic);

										$query3 = "INSERT INTO posts(post_type, post_owner, post_title, post_description, post_tags, post_song, post_illust, post_views, post_favourites, post_flags) 
										VALUES ('Song', '".$_SESSION["user_id"]."', '$title', '$description', '$tags', '$path_song', '$path_pic', 0, 0, 0)";

										// Si se guarda
										if ($mysqli->query($query3) === TRUE) {
											echo '
											<div class="row section something-bad">
												<p> La cancion se ha guardado exitosamente! </p>
											</div>
											';

											$q = "SELECT * FROM posts WHERE post_title='$title' aND post_views=0 AND post_owner='".$_SESSION["user_id"]."'";
											$resultado = $mysqli->query($q);

											if (mysqli_num_rows($resultado) == 1) {
												$post = $resultado->fetch_assoc();
												header("Location: song.php?id=".$post['post_id']."");
											} else {
												echo '
												<div class="row section something-bad">
													<p> Algo ha interrumpido la subida del archivo </p>
													<p> Por favor, intentalo de nuevo </p>
												</div>
												';
											}

										// Si no se ha podido guardar
										} else {
											echo '
											<div class="row section something-bad">
												<p> La cancion no se ha podido guardar 11 </p>
												<p> Por favor, intentalo de nuevo </p>
											</div>
											';
										}

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

						// Si NO se ha subido una imagen
						} else {

							// Si se guarda
							if ($mysqli->query($query2) === TRUE) {
								echo '
								<div class="row section something-bad">
									<p> La cancion se ha podido guardado exitosamente! </p>
								</div>
								';

								$q = "SELECT * FROM posts WHERE post_title='$title' aND post_views=0 AND post_owner='".$_SESSION["user_id"]."'";
								if ($mysqli->query($q) === TRUE) {
									header("Location: song.php?id=".$post['post_id']."");
								} else {
									header("Location: index.php");
								}

							// Si no se ha podido guardar
							} else {
								echo '
								<div class="row section something-bad">
									<p> La cancion no se ha podido guardar 22</p>
									<p> Por favor, intentalo de nuevo </p>
								</div>
								';
							}	
						}


					// Si la cancion sobrepasa el tamaño limite
					} else  {
						echo '
						<div class="row section something-bad">
							<p> El tamaño de la cancion sobrepasa el tamaño maximo permitido (5 MB) </p>
							<p> O bien no tiene contenido (0 bytes) </p>
							<p> Por favor, intentalo de nuevo </p>
						</div>
						';
					}
				}
			}

		} elseif ($ok == TRUE) {

			?>

			<form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3>Sube aqui tu Canción</h3>
							</div>
							<div class="panel-body">
								<div class="row">

									<!-- Title, Tags and Description -->
									<div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<label class="sr-only" for="Titulo">Titulo </label>
												<input class="form-control" type="text" name="title" id="Titulo" required="required" placeholder="Titulo de la Canción" maxlength="30">
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
												<textarea class="form-control" id="descBox" name="description" required="required" placeholder="Una breve descripción de la cancion" maxlength="500"></textarea>
											</div>
										</div>
									</div>

									<!-- File Inputs and Preview -->
									<div class="col-md-6 left-side">
										<div class="form-group">
											<div class="col-md-12">
												<label for="song">Selecciona la cancion que deseas publicar</label>
												<div class="new-input">
													<input id="song" type="file" name="song" accept="audio/*" required="required">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<label for="cover">Escoge una imagen para usarla como 'cover' (Debe ser cuadrada)</label>
												<div class="new-input">
													<input id="cover" type="file" required="required" name="pic" accept="image/*" onchange="previewFile()">
												</div>
											</div>
										</div>
										<div class="row section">
											<div class="col-lg-12">
												<img id="preview" class="img-responsive preview" src="img/preview.png" alt="Tu Ilustración"/>
											</div>
										</div>
									</div>

								</div>

								<!-- Submit Button -->
								<div class="row section">
									<div class="col-lg-12">
										<div >
											<input class="btn btn-success submitButton" type="submit" name="submit" value="Subir Canción">
										</div>				
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<?php 
		}
		?>

		<?php 
		mysqli_close($mysqli);
		?>
	</div>
</body>
</html>