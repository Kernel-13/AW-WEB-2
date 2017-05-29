<?php
session_start();
require('includes/db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/session-style.css">
	<script type="text/javascript" src="js/codigos.js" ></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<title>Inicio de Sesion</title>
</head>
<body>

	<?php require "includes/navbar.php"; ?>

	<?php 

	if (isset($_SESSION['username'])) {
		header("Location: index.php");
	} else {

		?>


		<div class="container-fluid login">
			<div class="row form-class">
				<div class="col-lg-12">

					<?php

					if (isset($_POST['username'])){

						$username = htmlspecialchars(stripslashes($_POST['username']));
						$username = mysqli_real_escape_string($mysqli,$username);
						$password = htmlspecialchars(stripslashes($_POST['password']));
						$password = mysqli_real_escape_string($mysqli,$password);

						$query = "SELECT * FROM users WHERE user_name='$username'";
						$result = mysqli_query($mysqli,$query) or die(mysql_error());
						$rows = mysqli_num_rows($result);
						$login = $result->fetch_assoc();

						if($rows==1 && password_verify($password, $login['user_pass'])) {
							$_SESSION['username'] = $login['user_name'];
							$_SESSION['user_id'] = $login['user_id'];
							$_SESSION['user_type'] = $login['user_type'];
							if ($login['user_isAdmin'] == TRUE) {
								$_SESSION['isAdmin'] = TRUE;
							} else {
								$_SESSION['isAdmin'] = FALSE;
							}
							header("Location: user.php?id=".$_SESSION['user_id']."");
						} else {

							echo '
							<div class="row section something-bad">
								<h3>El usuario o contraseña introducido son incorrectos!</h3><br>
								<h4>Por favor, intenta iniciar sesion de nuevo visitando <a href="login.php">esta pagina</a></h4>
								<h4>O bien, si no estas registrado, registrate en <a href="register.php">este enlace</a></h4>
							</div>
							';

						}
					} else { 
						?>

						<div class="panel panel-info">
							<div class="panel-heading">
								Inicio de Sesión
							</div>
							<div class="panel-body">
								<form class="form-horizontal" action="" method="post">
									<div class="form-group">
										<div class="col-sm-12">
											<label class="sr-only" for="username">Email</label>
											<input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12"> 
											<label class="sr-only" for="pass">Password</label>
											<input type="password" class="form-control" name="password" required="required" id="pass" placeholder="Password">
										</div>
									</div>
									<!--						
									<div>
										<div class="g-recaptcha" data-sitekey="6LcofhsUAAAAAOJ-p5clDHz38mzOHn4Ixicg5aeh"></div>
									</div>
								-->
								<div class="form-group"> 
									<div class="col-sm-12 submitButton">
										<button type="submit" class="btn btn-success">Iniciar Sesión</button>
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

	PONER MYSQL CLOSE

	<a href="https://icons8.com/web-app/13114/Cancel">Cancel icon credits</a>
	<a href="https://icons8.com/web-app/13115/Ok">Ok icon credits</a>
-->
</body>
</html>