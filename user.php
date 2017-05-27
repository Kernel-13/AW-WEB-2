<?php
session_start();
require('includes/db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/profile-view.css">
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<?php 

	if (!isset($_GET['id'])) {
		echo '
		<div class="container">
			<div class="row section something-bad">
				<p> No se ha introducido ningún usuario </p>
			</div>
		</div>
		';
	} else {
		$secure_id = mysqli_real_escape_string($mysqli,stripslashes( $_GET['id']));
		$the_user = get_user_from_id($mysqli, $secure_id);
		if (is_null($the_user)) {
			echo '
			<div class="container">
				<div class="row section">
					<div class="panel panel-info" style="text-align: center;">
						<div class="panel-heading">
							Usuario no encontrado
						</div>
						<div class="panel-body" style="color: gray;">
							<h3>No existe ningun usuario con ese ID</h3>
						</div>
					</div>
				</div>
			</div>
			';
		} else {
			echo '
			<div class="container">

				<!-- User Pic / Description -->
				<div class="row section">
					<div class="col-md-3 col-sm-4 col-xs-2 media-left">
						<div class="aling-img">
							<img alt="Imagen de Usuario" id="user-pic" class="img-responsive img-rounded" src="'.$the_user["user_avatar"].'">
						</div>
					</div>
					<div class="col-md-9 col-sm-8 col-xs-10">
						<div class="media-body">
							<h2 class="media-heading"> '.$the_user["user_name"].' </h2>
							<p class="description-p">	'.$the_user["user_description"].' </p>
						</div>
					</div>
				</div>

				<!-- User Last Posts -->
				<div class="row section">
					<div class="col-lg-12">
						<!-- Tabs -->
						<ul class="nav nav-tabs nav-justified">';

							if ($the_user["user_type"] == "Illustrator") {
								echo '
								<li class="active"><a data-toggle="tab" href="#illust">Ilustraciones</a></li>
								<li><a data-toggle="tab" href="#following">Following</a></li> 
								<li><a data-toggle="tab" href="#followers">Followers</a></li>'; 
							} elseif($the_user["user_type"] == "Composer") {
								echo '
								<li class="active" ><a data-toggle="tab" href="#music">Canciones</a></li>
								<li><a data-toggle="tab" href="#following">Following</a></li> 
								<li><a data-toggle="tab" href="#followers">Followers</a></li>'; 
							}

							echo '
						</ul>

						<!-- Tab Content -->
						<div class="tab-content">

							<!-- Music Content -->
							<div id="music" class="tab-pane fade in active user-posts">
								<div class="row">
									<div class="col-lg-12 flex">
										<div class="thumbnail">
											<a href="song.html"><img class="img-responsive" src="img/a1.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="song.html"> Ejemplo 1 </a>
											</div>
										</div>

										<div class="thumbnail">
											<a href="song.html"><img class="img-responsive" src="img/a2.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="song.html"> Ejemplo 2 </a>
											</div>
										</div>

										<div class="thumbnail">
											<a href="song.html"><img class="img-responsive" src="img/a3.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="song.html"> Ejemplo 3 </a>
											</div>
										</div>

										<div class="thumbnail">
											<a href="song.html"><img class="img-responsive" src="img/a4.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="song.html"> Ejemplo 4 </a>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 flex">

										<div class="thumbnail">
											<a href="song.html"><img class="img-responsive"  src="img/a5.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="song.html"> Ejemplo 1 </a>
											</div>
										</div>

										<div class="thumbnail">
											<a href="song.html"><img class="img-responsive"  src="img/a6.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="song.html"> Ejemplo 2 </a>
											</div>
										</div>

										<div class="thumbnail">
											<a href="song.html"><img class="img-responsive"  src="img/a7.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="song.html"> Ejemplo 3 </a>
											</div>
										</div>

										<div class="thumbnail">
											<a href="song.html"><img class="img-responsive"  src="img/a8.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="song.html"> Ejemplo 4 </a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Illustrations Content -->
							<div id="illust" class="tab-pane fade user-posts">
								<div class="row">';

									echo '
									<div class="col-lg-12 flex">
										<div class="thumbnail">
											<a href="illust.html"><img class="img-responsive"  src="img/a9.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="illust.html"> Ejemplo 1 </a>
											</div>
										</div>

										<div class="thumbnail">
											<a href="illust.html"><img class="img-responsive"  src="img/a10.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="illust.html"> Ejemplo 2 </a>
											</div>
										</div>

										<div class="thumbnail">
											<a href="illust.html"><img class="img-responsive"  src="img/a11.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="illust.html"> Ejemplo 3 </a>
											</div>
										</div>

										<div class="thumbnail">
											<a href="illust.html"><img class="img-responsive"  src="img/a12.jpg" alt="Imagen de Ejemplo"></a>
											<div class="caption">
												<a href="illust.html"> Ejemplo 4 </a>
											</div>
										</div>
									</div>';

									echo '
								</div>
							</div>

							<!-- Following -->
							<div id="following" class="tab-pane fade user-posts">
								<div class="row">
									';

									$following = $the_user["user_following"];
									$following_array = explode(",", $following);
									$f_count = count($following_array);

									if ($f_count < 2) {
										echo '
										<div class="row section something-bad">
											<p> '.$the_user['user_name'].' no esta siguiendo a nadie por ahora </p>
										</div>
										';
									} else {
										foreach ($follower as $following_array) {
											$friend = get_user_from_id($mysqli, $follower);
											echo '
											<div class="col-md-4">
												<div class="media">
													<div class="media-left">
														<a href="user.php?id='.$friend["user_id"].'"><img alt="Imagen de Amigo" src="'.$friend["user_avatar"].'" class="img-circle media-object user-avatar-comment"></a>
													</div>
													<div class="media-body media-right">
														<h3 class="media-heading">'.$friend["user_name"].'</h3>
													</div>
												</div>
											</div>
											';
										}
									}
									echo'
								</div>
							</div>

							<!-- Followers -->
							<div id="followers" class="tab-pane fade user-posts">
								<div class="row">
									';

									$followers = $the_user["user_following"];
									$followers_array = explode(",", $followers);
									$f_count = count($followers_array);

									if ($f_count < 2) {
										echo '
										<div class="row section something-bad">
											<p> Nadie sigue a '.$the_user['user_name'].'</p>
											<p> ¡Se el primero! </p>
										</div>
										';
									} else {
										foreach ($follower as $followers_array) {
											$friend = get_user_from_id($mysqli, $follower);
											echo '
											<div class="col-md-4">
												<div class="media">
													<div class="media-left">
														<a href="user.php?id='.$friend["user_id"].'"><img alt="Imagen de Amigo" src="'.$friend["user_avatar"].'" class="img-circle media-object user-avatar-comment"></a>
													</div>
													<div class="media-body media-right">
														<h3 class="media-heading">'.$friend["user_name"].'</h3>
													</div>
												</div>
											</div>
											';
										}
									}
									echo'
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
		}
	}
	?>



</body>
</html>