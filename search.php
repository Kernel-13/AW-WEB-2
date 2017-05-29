<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/profile-view.css">
	<link rel="stylesheet" type="text/css" href="css/messages.css">
	<title>Busqueda</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<div class="container">

		<?php 

		if (!isset($_GET['texto'])) {
			echo '
			<div class="row section something-bad">
				<p> Debes introducir alguna palabra en la barra de busqueda </p>
			</div>
			';
		} else {

			?>

			<!-- Message Management -->
			<div class="row section">
				<div class="col-lg-12">
					<h3>Resultados de la Busqueda</h3>
				</div>
				<div class="col-lg-12">

					<!-- Tabs -->
					<ul class="nav nav-tabs nav-justified">
						<li class="active"><a data-toggle="tab" href="#songs">Canciones</a></li>
						<li><a data-toggle="tab" href="#dibujos">Ilustraciones</a></li>
						<li><a data-toggle="tab" href="#usuarios">Usuarios</a></li>
					</ul>

					<!-- Tab Content -->
					<div class="tab-content">

						<!-- New  Messages -->
						<div id="songs" class="tab-pane fade in active user-posts">
							<?php 

							$busqueda = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_GET['texto']))));
							$texto = explode(" ", $busqueda);
							$query = "";
							foreach($texto as $key) {

								if (!empty($query)) {
									$query = $query . " OR "; 
								}

								$query = $query."post_title LIKE '%$key%' OR post_tags LIKE '%$key%' OR post_description LIKE '%$key%'";
							}

							$real_query = "SELECT * FROM posts WHERE $query AND post_type='Song'";
							$resultado = $mysqli->query($real_query);
							$rows = mysqli_num_rows($resultado);
							$count = 0;

							if ($rows == 0) {
								echo '
								<div class="row section something-bad">
									<h3> No existen canciones que contengan "'.$busqueda.'"</h3>
								</div>
								';
							} else {
								while ($res = $resultado->fetch_assoc()) {
									$user_data = get_user_from_id($mysqli, $res['post_owner']);

									if ($res['post_type'] == 'Song') {
										echo '
										<div class="col-md-12 section">
											<div class="media">
												<div class="media-left">
													<a href="song.php?id='.$res['post_id'].'"><img alt="Preview" src="'.$res['post_illust'].'" class="media-object search"></a>
												</div>
												<div class="media-right media-body">
													<h3 class="media-heading"> <a href="song.php?id='.$res['post_id'].'">'.$res['post_title'].'</a> </h3>
													<h4 class="media-heading"> <a href="user.php?id='.$user_data['user_id'].'">By '.$user_data['user_name'].'</a></h4>
													<p>'.$res['post_description'].'</p>
													<p> Tags: ';

														$tags = $res['post_tags'];
														$tag_list = explode(",", $tags);

														if (count($tag_list) > 0) {
															foreach ($tag_list as $tag) {
																echo '<a href="search.php?texto='.trim(urlencode($tag)).'">'.$tag.'</a> ';
															}
														} else {
															echo "No Tags";
														}

														echo 
														'
													</p>
												</div>
											</div>
										</div>
										';
										$count += 1;
									} 
									
									if ($count == 0)  {
										echo '
										<div class="row section something-bad">
											<h3> No existen canciones que contengan "'.$busqueda.'"</h3>
										</div>
										';
									}

								}
							}

							?>
						</div>

						<!-- Read Messages -->
						<div id="dibujos" class="tab-pane fade user-posts">
							
							<?php 

							$busqueda = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_GET['texto']))));
							$texto = explode(" ", $busqueda);
							$query = "";
							foreach($texto as $key) {

								if (!empty($query)) {
									$query = $query . " OR "; 
								}

								$query = $query."post_title LIKE '%$key%' OR post_tags LIKE '%$key%' OR post_description LIKE '%$key%'";
							}

							$real_query = "SELECT * FROM posts WHERE $query AND post_type='Picture'";
							$resultado = $mysqli->query($real_query);
							$rows = mysqli_num_rows($resultado);
							$count = 0;

							if ($rows == 0) {
								echo '
								<div class="row section something-bad">
									<h3> No existen ilustraciones que contengan "'.$busqueda.'"</h3>
								</div>
								';
							} else {
								while ($res = $resultado->fetch_assoc()) {
									$user_data = get_user_from_id($mysqli, $res['post_owner']);

									if ($res['post_type'] == 'Picture') {
										echo '
										<div class="col-md-12 section">
											<div class="media">
												<div class="media-left">
													<a href="illust.php?id='.$res['post_id'].'"><img alt="Preview" src="'.$res['post_illust'].'" class="media-object search"></a>
												</div>
												<div class="media-right media-body">
													<h3 class="media-heading"> <a href="illust.php?id='.$res['post_id'].'">'.$res['post_title'].'</a> </h3>
													<h4 class="media-heading"> <a href="user.php?id='.$user_data['user_id'].'">By '.$user_data['user_name'].'</a></h4>
													<p>'.$res['post_description'].'</p>
													<p> Tags: ';

														$tags = $res['post_tags'];
														$tag_list = explode(",", $tags);

														if (count($tag_list) > 0) {
															foreach ($tag_list as $tag) {
																echo '<a href="search.php?texto='.trim($tag).'">'.$tag.'</a> ';
															}
														} else {
															echo "No Tags";
														}

														echo 
														'
													</p>
												</div>
											</div>
										</div>
										';
										$count += 1;
									}
								}

								if ($count == 0)  {
									echo '
									<div class="row section something-bad">
										<h3> No existen ilustraciones que contengan "'.$busqueda.'"</h3>
									</div>
									';
								}
							}
							
							?>
						</div>

						<!-- Sent Messages -->
						<div id="usuarios" class="tab-pane fade user-posts">
							<?php 

							$busqueda = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_GET['texto']))));
							$texto = explode(" ", $busqueda);
							$query = "";
							foreach($texto as $key) {

								if (!empty($query)) {
									$query = $query . " OR "; 
								}

								$query = $query."user_name LIKE '%$key%' OR user_description LIKE '%$key%'";
							}

							$real_query = "SELECT * FROM users WHERE $query";
							$resultado = $mysqli->query($real_query);
							$rows = mysqli_num_rows($resultado);

							if ($rows == 0) {
								echo '
								<div class="row section something-bad">
									<h3> No existen usuarios que contengan "'.$busqueda.'" en el nombre </h3>
								</div>
								';
							} else {
								while ($res = $resultado->fetch_assoc()) {

									echo '
									<div class="col-md-12 section">
										<div class="media">
											<div class="media-left">
												<a href="user.php?id='.$res['user_id'].'"><img alt="Preview" src="'.$res['user_avatar'].'" class="media-object search"></a>
											</div>
											<div class="media-right media-body">
												<h3 class="media-heading"> <a href="user.php?id='.$res['user_id'].'">'.$res['user_name'].'</a></h3>
												<h4>'.$res['user_description'].'</h4>
											</div>
										</div>
									</div>
									';
								}
							}
							
							?>
						</div>
					</div>
				</div>
			</div>
			<?php 
		} ?>
	</div>
	<?php 
	mysqli_close($mysqli);
	?>
</body>
</html>