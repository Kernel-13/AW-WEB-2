<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<script type="text/javascript" src="js/codigos.js" ></script>
	<link rel="stylesheet" type="text/css" href="css/session-style.css">
	<link rel="stylesheet" type="text/css" href="css/upload-style.css">
	<title>Modificar Usuario</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>

	<div class="container register">
		<div class="row register-class">
			<div class="col-lg-12">
				<?php 

				$ok = FALSE;
				$user = "";

				if (!isset($_SESSION['user_id'])) {
					echo '
					<div class="row section something-bad">
						<p> Debes estar registrado y haber iniciado sesión </p>
					</div>
					';
				} 

				if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
					$id=$_GET['id'];
					$q = "SELECT * FROM users WHERE user_id='$id' LIMIT 1";
					$resultado = $mysqli->query($q);

					if (mysqli_num_rows($resultado) == 1) {
						$user = $resultado->fetch_assoc();
						if ($user['user_id'] == $_SESSION['user_id']) {
							$ok = TRUE;
						} else {
							echo '
							<div class="row section something-bad">
								<p> No puedes un perfil que no es tuyo </p>
							</div>
							';
						}
					} else {
						echo '
						<div class="row section something-bad">
							<p> No existe un usuario con el ID asignado </p>
						</div>
						';
					}
				}

				if (isset($_POST['submit']) && $ok === TRUE) {

					$description = $user['user_description'];
					$path_pic = $user['user_avatar'];

					if (isset($_POST['description']) && $_POST['description'] != "") {
						$description = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["description"]))));
					} else {
						$description = mysqli_real_escape_string($mysqli,stripslashes(htmlspecialchars(trim(strip_tags($user['user_description'])))));
					}

					if (isset($_FILES['avatar']) && !empty($_FILES["avatar"]["name"])) {


						$maxsize = 5297152;
						$permitido = array('image/jpeg', 'image/png');


						if(($_FILES['avatar']['size'] >= $maxsize) || ($_FILES["avatar"]["size"] == 0)) {

							echo '
							<div class="row section something-bad">
								<p> El tamaño de la imagen escogida sobrepasa el tamaño maximo permitido (5 MB) </p>
								<p> O bien no tiene contenido (0 bytes) </p>
							</div>
							';

						} else {
							$filename = $_FILES['avatar']['tmp_name'];
							list($width, $height) = getimagesize($filename);
							$sub = abs($width - $height);

							if ($sub > 10 || $width < 250 || $height < 250){
								echo '
								<div class="row section something-bad">
									<p> La imagen escogida no es un cuadrada </p>
								</div>
								';
							} else {
								if (in_array($_FILES["avatar"]["type"], $permitido)) {

									$info = pathinfo($_FILES["avatar"]["name"]);
									$extension = $info["extension"]; 
									$name = "avatar_".$username.".".$extension; 
									$path = 'posts/'.$username.'/'.$name;

									if (!is_dir('posts/'.$username)) {
										echo "CREATING PATH";
										mkdir('posts/'.$username, 0777, true);
									}

									move_uploaded_file( $_FILES['avatar']['tmp_name'], $path);

									$id=$user['user_id'];
									$update = "UPDATE users SET user_description='$description', user_avatar='$path' WHERE user_id='$id'";
									if ($mysqli->query($update) === TRUE) {
										header("Location: user.php?id=".$_SESSION['user_id']."");
									} else {
										echo '
										<div class="row section something-bad">
											<h3> Algo bizarro ha ocurrido al intentar registrate</h3><br>
											<h4>Por favor, intentalo de nuevo</h4>
										</div>
										';
									}

								} else {
									echo '
									<div class="row section something-bad">
										<h3>La imagen que has subido no es JPEG o PNG</h3><br>
										<h4>Por favor, intentalo de nuevo</h4>
									</div>
									';
								}
							}
						}						
					}

					echo $path_pic;

					$id=$user['user_id'];
					$q = "UPDATE users SET user_description='$description' WHERE user_id='$id'";

					if ($mysqli->query($q) === TRUE) {
						echo '
						<div class="row section something-bad">
							<p> El usuario se ha modificado exitosamente! </p>
						</div>
						';
						echo $path_pic;
						header("Location: user.php?id=".$_SESSION['user_id']."");

					} else {
						echo '
						<div class="row section something-bad">
							<p> El usuario no se ha modificado! </p>
							<p> Por favor, intentalo de nuevo </p>
						</div>
						';
					}

				} elseif($ok === TRUE) {

					?>

					<div class="panel panel-info">
						<div class="panel-heading">
							Modificar Perfil
						</div>
						<div class="panel-body">
							<form class="form-horizontal" <?php echo 'action="'.$_SERVER['PHP_SELF'].'?id='.$user['user_id'].'"'; ?> method="post" enctype="multipart/form-data">
								<div class="row">

									<div class="col-md-12">			
										<div class="form-group">
											<div class="col-sm-12"> 
												<label class="sr-only" for="descBoxx"> Descripcion </label>
												<textarea class="form-control" id="descBoxx" name="description" required="required" placeholder="Describete a ti mismo en menos de 500 caracteres" maxlength="500"><?php echo $user["user_description"] ?></textarea>
											</div>
										</div>								
										<div class="form-group">
											<div>
												<h4> Escoge una foto para tu perfil	</h4>
											</div>
											<div class="col-sm-12"> 
												<label class="sr-only" for="avatar"> Escoge tu avatar </label>
												<input type="file" name="avatar" class="form-control" id="avatar">
											</div>
										</div>	
										<div class="row">
											<div class="col-md-12">
												<div class="form-group"> 
													<div class="col-sm-12">
														<button type="submit" id="submit-button" name="submit" class="btn btn-warning">Aplicar Cambios</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						
					</div>
					<?php 
				} ?>
			</div>
		</div>
	</div>
</div>
<?php 
mysqli_close($mysqli);
?>
</body>
</html>