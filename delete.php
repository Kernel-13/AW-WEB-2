<?php
session_start();
require('includes/db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/session-style.css">
	<title>Borrado</title>
</head>
<body>

	<?php require "includes/navbar.php"; ?>

	<div class="container-fluid login">
		<div class="row delete-class">
			<div class="col-lg-12">

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
						} elseif ($_SESSION['user_type'] == 'Admin') {
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

				if ((isset($_POST['yes']) || isset($_POST['no'])) && $ok === TRUE) {
					if (isset($_POST['yes'])) {
						$id = $post['post_id'];
						$query = "DELETE FROM posts WHERE post_id='$id'";
						if ($mysqli->query($query) === TRUE) {
							echo '
							<div class="row section something-bad">
								<p> Post Eliminado Satisfactoriamente </p>
							</div>
							';
						} else {
							echo '
							<div class="row section something-bad">
								<p> No se pudo borrar el post deseado </p>
							</div>
							';
						}
					} else {
						if ($post['post_type'] == 'Song') {
							header("Location: song.php?id=".$post['post_id']."");
						} else {
							header("Location: illust.php?id=".$post['post_id']."");
						}
					}
				} elseif ($ok === TRUE){
					?>

					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>¿Estas seguro de que deseas borrar "<?php echo $post['post_title']; ?>" ?</h4>
						</div>
						<div class="panel-body">
							<form class="form-horizontal"<?php echo 'action="'.$_SERVER['PHP_SELF'].'?id='.$post["post_id"].'"'; ?> method="post">
								<div class="form-group"> 
									<div class="col-sm-12 submitButton">
										<button type="submit" name="yes" class="btn btn-danger">Si</button>
										<button type="submit" name="no" class="btn btn-info">No</button>
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