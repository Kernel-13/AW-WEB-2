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

					$password = $user['user_pass'];
					$secure_password = "";

					if (isset($_POST['password']) && $_POST['password'] != "") {
						$password = mysqli_real_escape_string($mysqli,stripslashes($_POST['password']));
						$secure_password=password_hash($password, PASSWORD_BCRYPT);
					} else {
						$secure_password = $user['user_pass'];
					}

					$id=$user['user_id'];
					$q = "UPDATE users SET user_pass='$secure_password' WHERE user_id='$id'";

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
							cambio de Contraseña
						</div>
						<div class="panel-body">
							<form class="form-horizontal" <?php echo 'action="'.$_SERVER['PHP_SELF'].'?id='.$user['user_id'].'"'; ?> method="post" enctype="multipart/form-data">
								<div class="row">

									<div class="col-md-12">			
										<div class="col-sm-12 form-group" id="wrongPass" style="display: none">
											<h4 style="color:red">Las contraseñas no son iguales!</h4>
										</div>
										<div class="form-group">
											<div class="col-sm-12"> 
												<label class="sr-only" for="pass"> Contraseña </label>
												<input type="password" class="form-control" id="pass" name="password" required="required" placeholder="Indique su nueva contraseña">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-12"> 
												<label class="sr-only" for="pass"> Repita la Contraseña </label>
												<input type="password" onchange="correctPassword()" class="form-control" id="pass2" name="password2" required="required" placeholder="Repita la nueva contraseña">
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<div class="form-group"> 
													<div class="col-sm-12">
														<button type="submit" disabled="true" id="submit-button" name="submit" class="btn btn-warning">Aplicar Cambios</button>
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
<script type="text/javascript">
	function correctPassword(){
		var pass1 = document.getElementById("pass");
		var pass2 = document.getElementById("pass2");
		var helpText = document.getElementById("wrongPass");
		if(pass1.value == pass2.value){
			pass1.style.background = "lightgreen";
			pass2.style.background = "lightgreen";
			helpText.style.display = "none";
			helpText.style.color = "black";
			helpText.style.margin = "5px";
			document.getElementById("submit-button").disabled = false;
		} else {
			pass1.style.background = "navajowhite";
			pass2.style.background = "navajowhite";
			helpText.style.display = "initial";
			document.getElementById("submit-button").disabled = true;
		}
	}
</script>
</body>
</html>