<?php
session_start();
require('includes/db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="js/codigos.js" ></script>
	<link rel="stylesheet" type="text/css" href="css/session-style.css">
	<title>Registro</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<?php 
	if (isset($_SESSION['username'])) {
		header("Location: index.php");
	} else {

		?>

		<div class="container register">
			<div class="row register-class">
				<div class="col-lg-12">

					<?php

					if (isset($_POST['username'])){

						$username = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["username"]))));
						$email = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["email"]))));
						$description = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["description"]))));
						$password = mysqli_real_escape_string($mysqli,stripslashes($_POST['password']));

						$secure_password=password_hash($password, PASSWORD_BCRYPT);

						$q1 = "SELECT * FROM users WHERE user_name='$username'";
						$q2 = "SELECT * FROM users WHERE user_email='$email'";
						$reg1 = mysqli_query($mysqli,$q1) or die(mysql_error());
						$reg2 = mysqli_query($mysqli,$q2) or die(mysql_error());
						$rows1 = mysqli_num_rows($reg1);
						$rows2 = mysqli_num_rows($reg2);

						// Si ya existe el usuario
						if($rows1==1){

							echo '
							<div class="row section something-bad">
								<h3>El nombre de usuario introducido ya ha sido registrado!</h3><br>
								<h4>Por favor, intenta registrarte con un nuevo nombre de usuario visitando <a href="register.php">esta pagina</a></h4>
								<h4>O bien, si ya estas registrado, inicia sesión en <a href="login.php">este enlace</a></h4>
							</div>
							';
						// Si ya existe el email
						} elseif ($rows2==1) {

							echo '
							<div class="row section something-bad">
								<h3>El email introducido ya ha sido registrado!</h3><br>
								<h4>Por favor, intenta registrarte con un nuevo email visitando <a href="register.php">esta pagina</a></h4>
								<h4>O bien, si ya estas registrado, inicia sesión en <a href="login.php">este enlace</a></h4>
							</div>
							';
						} elseif (!isset($_POST['kind'])) {

							echo '
							<div class="row section something-bad">
								<h3>No has seleccionado el tipo de usuario que quieres ser!</h3><br>
								<h4>Por favor, intenta registrarte con un nuevo email visitando <a href="register.php">esta pagina</a></h4>
								<h4>O bien, si ya estas registrado, inicia sesión en <a href="login.php">este enlace</a></h4>
							</div>
							';

						} else {

							$maxsize = 5297152;
							if(($_FILES['avatar']['size'] >= $maxsize) || ($_FILES["avatar"]["size"] == 0)) {

								echo '
								<div class="row section something-bad">
									<h3>La imagen que subas no debe superar los 4.5 MB! </h3><br>
									<h4>Por favor, intentalo de nuevo visitando <a href="register.php">esta pagina</a></h4>
									<h4>O bien, si ya estas registrado, inicia sesión en <a href="login.php">este enlace</a></h4>
								</div>
								';

							} else {

								$permitido = array('image/jpeg', 'image/png');

								$filename = $_FILES['avatar']['tmp_name'];
								list($width, $height) = getimagesize($filename);
								$sub = abs($width - $height);
								if ($sub > 10 || $width < 250 || $height < 250){

									echo '
									<div class="row section something-bad">
										<h3>La imagen que subas debe ser cuadrada y tener un tamaño minimo de 250x250 </h3><br>
										<h4>Por favor, intentalo de nuevo visitando <a href="register.php">esta pagina</a></h4>
										<h4>O bien, si ya estas registrado, inicia sesión en <a href="login.php">este enlace</a></h4>
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

										$tipo = $_POST['kind'];
										$registro = "INSERT INTO users(user_name, user_avatar, user_description, user_type, user_following, user_followers, user_email, user_pass, user_isAdmin) VALUES ('$username', '$path', '$description', '$tipo','0', '0', '$email', '$secure_password', FALSE)";
										if ($mysqli->query($registro) === TRUE) {
											$person = get_user_from_username($mysqli, $username);
											$_SESSION['username'] = $username;
											$_SESSION['user_id'] = $person["user_id"];
											$_SESSION['user_type'] = $person['user_type'];
											$_SESSION['isAdmin'] = FALSE;

											header("Location: user.php?id=".$_SESSION['user_id']."");
										} else {

											echo '
											<div class="row section something-bad">
												<h3> Algo bizarro ha ocurrido al intetar registrate</h3><br>
												<h4>Por favor, intentalo de nuevo visitando <a href="register.php">esta pagina</a></h4>
												<h4>O bien, si ya estas registrado, inicia sesión en <a href="login.php">este enlace</a></h4>
											</div>
											';
										}

									}
								}
							}
						}
					} else { 
						?>

						<div class="panel panel-info">
							<div class="panel-heading">
								Registro
							</div>
							<div class="panel-body">
								<form class="form-horizontal" <?php echo 'action="'.$_SERVER['PHP_SELF'].'"'; ?> method="post" enctype="multipart/form-data">
									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<div class="col-sm-12"> 
													<label class="sr-only" for="name"> Nombre de Usuario </label>
													<input type="text" class="form-control" required="required" id="name" name="username" placeholder="Nombre de Usuario">
												</div>
											</div>		
											<div class="form-group">
												<div class="col-sm-9">
													<label class="sr-only" for="email"> Email </label>
													<input type="email" class="form-control" id="email" placeholder="Email" name="email" required="required" onchange="validar(this.value)">
												</div>
												<div class="col-sm-3 message-box">
													<span id="er_icon" class="icon_hidden"><img alt="Invalido" class="signal" src="img/no.png"> Invalido </span>
													<span id="ok_icon" class="icon_hidden"><img alt="Correcto" class="signal" src="img/ok.png"> Correcto </span>
												</div>
											</div>					
											<div class="form-group">
												<div class="col-sm-12"> 
													<label class="sr-only" for="pass"> Contraseña </label>
													<input type="password" class="form-control" required="required" id="pass" name="password" placeholder="Indique su contraseña">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12"> 
													<label class="sr-only" for="descBox"> Descripcion </label>
													<textarea class="form-control" id="descBox" name="description" required="required" placeholder="Describete a ti mismo en menos de 500 caracteres" maxlength="500"></textarea>
												</div>
											</div>
										</div>


										<div class="col-md-6 register_second">
											<div class="form-group">
												<div>
													<h4>Deseas registrarte como...	</h4>
												</div>
												<div class="col-sm-12 ">
													<fieldset class="kind-selection ">
														<legend class="sr-only"> Escoge que deseas ser</legend>
														<div>
															<input type="radio" name="kind" value="Composer" id="musician"> Músico
															<label class="sr-only" for="musician"> Musico </label>
														</div>
														<div>
															<input type="radio" name="kind" value="Illustrator" id="illustrator"> Ilustrador
															<label class="sr-only" for="illustrator"> Ilustrador </label>
														</div>
													</fieldset>
												</div>
											</div>
											<div class="form-group">
												<div>
													<h4> Escoge una foto para tu perfil	</h4>
												</div>
												<div class="col-sm-12"> 
													<label class="sr-only" for="avatar"> Escoge tu avatar </label>
													<input type="file" name="avatar" class="form-control" required="required" id="avatar">
												</div>
											</div>	
											<!--						
											<div>
												<div class="g-recaptcha" data-sitekey="6LcofhsUAAAAAOJ-p5clDHz38mzOHn4Ixicg5aeh"></div>
											</div>
										-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group"> 
													<div class="col-sm-12 submitButton">
														<button type="submit" class="btn btn-warning">Registrarse</button>
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
				} 
				?>

			</div>
		</div>			
	</div>

	<?php 
} ?>

<?php 
mysqli_close($mysqli);
?>
	<!--
	<a href="https://icons8.com/web-app/13114/Cancel">Cancel icon credits</a>
	<a href="https://icons8.com/web-app/13115/Ok">Ok icon credits</a>
-->
</body>
</html>