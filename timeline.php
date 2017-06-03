<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/timeline.css">	
	<link rel="stylesheet" type="text/css" href="css/profile-view.css">	
	<title>Mi Timeline</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<div class="container">

		<!-- Friends Activity -->
		<div class="row section">
			<div class="col-lg-12">
				<h2 class="title-header" >Actividad de las personas que sigues</h2>

				<?php 

				if (!isset($_SESSION['username'])) {
					echo '
					<div class="row section something-bad">
						<h3> Debes Iniciar Sesión o Registrarte para acceder a esta página! </h3>
					</div>
					';
				} else {
					echo '

					<!-- Tabs -->
					<ul class="nav nav-tabs nav-justified">
						<li class="active" ><a data-toggle="tab" href="#music">Canciones</a></li>
						<li><a data-toggle="tab" href="#illust">Ilustraciones</a></li>
					</ul>

					<!-- Tab Content -->
					<div class="tab-content">

						<!-- Friends Music Content -->
						<div id="music" class="tab-pane fade in active user-posts">
							<div class="row activity">';

								$songs = "SELECT * FROM posts WHERE post_type='Song' ORDER BY post_date";
								$resultado = $mysqli->query($songs) or die ($mysqli->error. " en la línea ".(__LINE__-1));

								$rows = mysqli_num_rows($resultado);
								if ($rows < 1) {
									// NO POSTS
								} else {

									$user_info = get_user_from_id($mysqli, $_SESSION['user_id']);
									$following = $user_info['user_following'];
									$array = explode(",", $following);
									$ok = FALSE;

									foreach ($array as $person) {
										$p = get_user_from_id($mysqli, $person);
										if (!is_null($p) && $p['user_type'] == 'Composer') {
											$ok = TRUE;
										}
									}

									if ($ok === FALSE) {
										echo '
										<div class="row section something-bad">
											<h3> No estas siguendo a ningún musico </h3>
										</div>
										';
									} else {

										$count = 0;
										while ($post = $resultado->fetch_assoc()) {
											if (in_array($post['post_owner'], $array)) {

												$user_data = get_user_from_id($mysqli, $post['post_owner']);

												echo '
												<div class="col-md-6">
													<div class="media">
														<div class="media-left">
															<a href="song.php?id='.$post['post_id'].'"><img alt="Preview" src="'.$post['post_illust'].'" class="media-object"></a>
														</div>
														<div class="media-right media-body">
															<h3 class="media-heading"> <a href="song.php?id='.$post['post_id'].'">'.$post['post_title'].'</a> </h3>
															<h4 class="media-heading"> <a href="user.php?id='.$user_data['user_id'].'">By '.$user_data['user_name'].'</a></h4>
															<p class="tags"> Tags: ';

																$tags = $post['post_tags'];
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
											}
										}
									}

									
								}

								echo '
							</div>
						</div>

						<!-- Friends Illustrations Content -->
						<div id="illust" class="tab-pane fade in user-posts">
							<div class="row activity illust-activity">';
								

								$illusts = "SELECT * FROM posts WHERE post_type='Picture' ORDER BY post_date";
								$resultado = $mysqli->query($illusts) or die ($mysqli->error. " en la línea ".(__LINE__-1));

								$rows = mysqli_num_rows($resultado);
								if ($rows < 1) {
									echo '
									<div class="row section something-bad">
										<h3> Aun no se ha subido ninguna ilustración a la página </h3>
									</div>
									';
								} else {

									$user_info = get_user_from_id($mysqli, $_SESSION['user_id']);
									$following = $user_info['user_following'];
									$array = explode(",", $following);
									$ok = FALSE;

									foreach ($array as $person) {
										$p = get_user_from_id($mysqli, $person);
										if (!is_null($p) && $p['user_type'] == 'Illustrator') {
											$ok = TRUE;
										}
									}

									if ($ok === FALSE) {
										echo '
										<div class="row section something-bad">
											<h3> No estas siguendo a ningún ilustrador </h3>
										</div>
										';
									} else {

										$count = 0;

										while ($post = $resultado->fetch_assoc()) {
											if (in_array($post['post_owner'], $array)) {

												$user_data = get_user_from_id($mysqli, $post['post_owner']);
												if ($count%3 == 0) {
													echo '<div class="row">';
												}
												echo '
												<div class="col-md-4">
													<div class="friend-illust miniatura">
														<img src="'.$post["post_illust"].'" alt="Avatar" class="image img-responsive img-rounded">
														<div class="middle">
															<div class="text">
																<h3><a href="illust.php?id='.$post['post_id'].'">'.$post['post_title'].'</a></h3>
																<h4><a href="user.php?id='.$user_data['user_id'].'">by '.$user_data['user_name'].'</a></h4>
															</div>
														</div>
													</div>
												</div>
												';

												$count += 1;

												if ($count%3 == 0) {
													echo '</div>';
												}
											}
										}

										if ($count%3 != 0) {
											echo '</div>';
										}

										if ($count == 0) {
											echo '
											<div class="row section something-bad">
												<h3> Los Ilustradores a los que sigues aun no han publicado nada </h3>
											</div>
											';
										}
									}
									
								}

								echo '
							</div>
						</div>

					</div>
					';
				}

				?>

			</div>
		</div>
	</div>
	
	<?php 
	mysqli_close($mysqli);
	?>
</body>
</html>