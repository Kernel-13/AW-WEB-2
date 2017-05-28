<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/profile-view.css">
	<link rel="stylesheet" type="text/css" href="css/timeline.css">	
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>

	<div class="container">

		<?php 
		if (!isset($_SESSION["username"])){
			echo '
			<div class="row section something-bad">
				<h3> Debes Iniciar Sesión o Registrarte para acceder a esta página! </h3>
			</div>
			';
		} else {
			
			echo '
			<div class="row section">
				<div class="col-lg-12">
					';

					if ($_SESSION["user_type"] == 'Composer') {
						echo '
						<!-- Music Content -->
						<h2 class="title-header">Mis Canciones Subidas</h2>
						<div id="edit-music" class="tab-pane fade in active user-posts edition">
							<div class="row">';

								$i = $_SESSION['user_id'];
								$music_query = "SELECT * FROM posts WHERE post_owner='$i' ORDER BY post_date";
								$music = $mysqli->query($music_query) or die ($mysqli->error. " en la línea ".(__LINE__-1));

								$rows = mysqli_num_rows($music);

								if ($rows > 0) {
									while ($song = $music->fetch_assoc()) {
										echo '
										<div class="col-md-6">
											<div class="media">
												<div class="media-left">
													<a href="song.php?id='.$song["post_id"].'"><img alt="ejemplo" src="'.$song["post_illust"].'" class="media-object img-rounded"></a>
												</div>
												<div class="media-right media-body edit-body">
													<h2 class="media-heading"> '.$song["post_title"].' </h2>
													<h3 class="media-heading"> <a href="edit_song.php?id='.$song["post_id"].'">Editar Canción</a> </h3>
												</div>
											</div>
										</div>';
									}
								} else {
									echo '
									<div class="row section something-bad">
										<p> No has subido nada por ahora </p>
									</div>
									';
								}

								echo '
							</div>
						</div>
						';
					} 

					if ($_SESSION["user_type"] == 'Illustrator') {

						echo '
						<!-- Illustrations Content -->
						<h2 class="title-header">Mis Ilustraciones Subidas</h2>
						<div id="edit-illust" class="tab-pane fade in active user-posts edition">
							<div class="row">';


								$i = $_SESSION['user_id'];
								$illust_query = "SELECT * FROM posts WHERE post_owner='$i' ORDER BY post_date";
								$pics = $mysqli->query($illust_query) or die ($mysqli->error. " en la línea ".(__LINE__-1));

								$rows = mysqli_num_rows($pics);

								if ($rows > 0) {
									while ($pic = $pics->fetch_assoc()) {
										echo '
										<div class="col-md-4">
											<div class="media">
												<div class="media-left">
													<a href="illust.php?id='.$pic["post_id"].'"><img alt="ejemplo" src="'.$pic["post_illust"].'" class="media-object img-rounded"></a>
												</div>
												<div class="media-right media-body">
													<h3 class="media-heading"> '.$pic["post_title"].' </h3>
													<h4 class="media-heading"> <a href="edit_illust.php?id='.$pic["post_id"].'"> Editar Illustración</a> </h4>
												</div>
											</div>
										</div>';
									}
								} else {
									echo '
									<div class="row section something-bad">
										<p> No has subido nada por ahora </p>
									</div>
									';
								}

								echo '	
							</div>
						</div>
						';
					}

					echo '
				</ul>
			</div>';
		}
		?>

	</div>

	<?php 
	mysqli_close($mysqli);
	?>
</div>
</body>
</html>