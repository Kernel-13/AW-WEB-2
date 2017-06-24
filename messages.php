<?php
session_start();
require('includes/db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/profile-view.css">
	<link rel="stylesheet" type="text/css" href="css/messages.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>   
	<title>Mis Mensajes</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<div class="container">
		<?php 
		if (!isset($_SESSION['username'])) {
			echo '
			<div class="container-fluid">
				<div class="row section something-bad"">
					<h2> Debes estar registrado y haber iniciado sesión para poder ver / enviar mensajes </h2>
				</div>
			</div>
			';
		} else {

			if (isset($_POST['receptor']) && isset($_POST['mensaje'])){

				$mensaje = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["mensaje"]))));
				$receiver = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["receptor"]))));

				$q = "SELECT * FROM users WHERE user_name='$receiver'";
				$resultado = mysqli_query($mysqli,$q) or die(mysql_error());
				$row = mysqli_num_rows($resultado);
				if($row == 1){

					$person = $resultado->fetch_assoc();
					$q2 = "INSERT INTO messages(message_sender, message_receiver, message_body)
					VALUES('".$_SESSION['user_id']."', '".$person['user_id']."', '".$mensaje."')";


					if ($mysqli->query($q2) === TRUE) {
						echo '
						<div class="row section something-bad" >
							<h5> El mensaje se ha enviado con exito.</h5>
						</div>
						';
					} else {
						echo '
						<div class="row section something-bad">
							<h5> A ocurrido un error.</h5>
						</div>
						';
					}

				} else {
					echo '
					<div class="row section something-bad" >
						<h5> El mensaje no se pudo enviar debido a que el usuario receptor no existe. </h5>
					</div>
					';
				}
			}

			?>


			<!-- Sending a Message -->
			<div class="row section">
				<div class="col-lg-12">
					<h3>Enviar Mensaje</h3>
				</div>
				<form <?php echo 'class="form-horizontal" action="'.$_SERVER['PHP_SELF'].'" method="post"'; ?>>
					<div class="col-lg-12">
						<div class="form-group">
							<div class="col-md-12">
								<label class="sr-only" for="receptor"> Destinatario </label>
								<input class="form-control auto" type="text" id="receptor" name="receptor" required="required" placeholder="Destinatario" maxlength="20">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label class="sr-only" for="mensajes"> Mensaje </label>
								<textarea class="form-control" name="mensaje" required="required" id="mensajes" placeholder="Escribe aquí tu mensaje" maxlength="500"></textarea>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<input type="submit" name="submit" value="Enviar" class="btn btn-success">
					</div>
				</form>
			</div>

			<!-- Message Management -->
			<div class="row section">
				<div class="col-lg-12">
					<h3>Bandeja de Entrada</h3>
				</div>
				<div class="col-lg-12">

					<!-- Tabs -->
					<ul class="nav nav-tabs nav-justified">
						<li class="active"><a data-toggle="tab" href="#new">Nuevos</a></li>
						<li><a data-toggle="tab" href="#sent">Enviados</a></li>
					</ul>

					<!-- Tab Content -->
					<div class="tab-content">

						<!-- New  Messages -->
						<div id="new" class="tab-pane fade in active user-posts">
							<?php get_messages($mysqli, $_SESSION['user_id']);	?>
						</div>

						<!-- Sent Messages -->
						<div id="sent" class="tab-pane fade user-posts">
							<?php get_sent_messages($mysqli, $_SESSION['user_id']);	?>
						</div>
					</div>
				</div>
			</div>
			<?php 
		} ?>
		<?php 
		mysqli_close($mysqli);
		?>
	</div>



	<script type="text/javascript">
		$(function() {
			$( ".auto" ).autocomplete({
				source: 'includes/autofill.php',
				data: { 
					'term' : $('.auto').val()
				},
				type: "GET"
			});
		});
	</script>
</body>
</html>