<?php
session_start();
require('includes/db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/profile-view.css">
	<link rel="stylesheet" type="text/css" href="css/timeline.css">
	<link rel="stylesheet" type="text/css" href="css/buttons.css">
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<div class="container">
		<?php 

		if (!isset($_GET['id'])) {
			echo '
			<div class="row section something-bad">
				<p> No se ha introducido ningún usuario </p>
			</div>
			';
		} else {
			$secure_id = mysqli_real_escape_string($mysqli,stripslashes( $_GET['id']));
			$the_user = get_user_from_id($mysqli, $secure_id);
			if (is_null($the_user)) {

				echo '
				<div class="row section something-bad">
					<h3>Usuario no encontrado!</h3><br>
					<h4>No existe ningun usuario con ese ID</h4>
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
								<hr>';

								if (!isset($_SESSION['user_id'])) {
									echo '
									<a class="btn btn-follow" href="follow.php?id='.$the_user["user_id"].'"> <span class="glyphicon glyphicon-eye-open"></span>  Seguir a '.$the_user["user_name"].'</a><br>
									';
								} else {
									if (!is_following($mysqli, $the_user["user_id"] ,$_SESSION['user_id'])) {
										echo '
										<a class="btn btn-follow" href="follow.php?id='.$the_user["user_id"].'"> <span class="glyphicon glyphicon-eye-open"></span>  Seguir a '.$the_user["user_name"].'</a><br>
										';
									} else {
										echo '
										<a class="btn btn-flag" href="follow.php?id='.$the_user["user_id"].'"> <span class="glyphicon glyphicon-eye-open"></span>  Dejar de Seguir a '.$the_user["user_name"].'</a><br>
										';
									}
								}

								echo '
							</div>
						</div>
					</div>

					<!-- User Last Posts -->
					<div class="row section">
						<div class="col-lg-12">
							<!-- Tabs -->
							<ul class="nav nav-tabs nav-justified">';

								$active_illust = "";
								$active_music = "";
								$active_following= "";
								if ($the_user["user_type"] == 'Admin') {
									echo '
									<li class="active"><a data-toggle="tab" href="#following">Following</a></li> 
									<li><a data-toggle="tab" href="#followers">Followers</a></li> 
									';
									$active_following= "in active";
								} else {
									if ($the_user["user_type"] == "Illustrator") {
										echo '
										<li class="active"><a data-toggle="tab" href="#illust">Ilustraciones</a></li>
										<li><a data-toggle="tab" href="#following">Following</a></li> 
										<li><a data-toggle="tab" href="#followers">Followers</a></li>'; 
										$active_illust = "in active";
										$active_music = "";
									} elseif($the_user["user_type"] == "Composer") {
										echo '
										<li class="active" ><a data-toggle="tab" href="#music">Canciones</a></li>
										<li><a data-toggle="tab" href="#following">Following</a></li> 
										<li><a data-toggle="tab" href="#followers">Followers</a></li>'; 
										$active_illust = "";
										$active_music = "in active";
									}
								}
								

								echo '
								<li><a data-toggle="tab" href="#fav-music"><span class="glyphicon glyphicon-heart"></span> Musica</a></li> 
								<li><a data-toggle="tab" href="#fav-illust"><span class="glyphicon glyphicon-heart"></span> Ilustraciones</a></li> 
							</ul>

							<!-- Tab Content -->
							<div class="tab-content">

								<!-- Music Content -->
								<div id="music" class="tab-pane fade '.$active_music.' user-posts">
									<div class="row activity">';

										$id = $the_user['user_id'];
										$songs = "SELECT * FROM posts WHERE post_owner='$id' ORDER BY post_date";
										$resultado = $mysqli->query($songs) or die ($mysqli->error. " en la línea ".(__LINE__-1));

										$rows = mysqli_num_rows($resultado);
										if ($rows < 1) {
											echo '
											<div class="row section something-bad">
												<h3> Este usuario aun no ha subido nada </h3>
											</div>
											';
										} else {

											$count = 0;
											while ($post = $resultado->fetch_assoc()) {
												$user_data = get_user_from_id($mysqli, $post['post_owner']);

												echo '
												<div class="col-md-6">
													<div class="media">
														<div class="media-left">
															<a href="song.php?id='.$post['post_id'].'"><img alt="Preview" src="'.$post['post_illust'].'" class="media-object"></a>
														</div>
														<div class="media-right media-body">
															<h3 class="media-heading"> <a href="song.php?id='.$post['post_id'].'">'.$post['post_title'].'</a> </h3>
															<p> Tags: ';

																$tags = $post['post_tags'];
																$tag_list = explode(",", $tags);

																if (count($tag_list) > 0) {
																	foreach ($tag_list as $tag) {
																		echo '<a href="search.php?texto='.trim(($tag)).'">'.$tag.'</a> ';
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
										
										echo '
									</div>
								</div>

								<!-- Illustrations Content -->
								<div id="illust" class="tab-pane fade '.$active_illust.' user-posts">
									<div class="row activity illust-activity ">';

										$id = $the_user['user_id'];
										$illusts = "SELECT * FROM posts WHERE post_owner='$id' ORDER BY post_date";
										$pictures = $mysqli->query($illusts) or die ($mysqli->error. " en la línea ".(__LINE__-1));

										$rows = mysqli_num_rows($pictures);
										if ($rows < 1) {
											echo '
											<div class="row section something-bad">
												<h3> Este usuario aun no ha subido nada </h3>
											</div>
											';
										} else {

											$count = 0;

											while ($post = $pictures->fetch_assoc()) {
												$user_data = get_user_from_id($mysqli, $post['post_owner']);

												if ($count%3 == 0) {
													echo '<div class="row">';
												}

												echo '
												<div class="col-md-4">
													<div class="friend-illust miniatura">
														<img src="'.$post['post_illust'].'" alt="Avatar" class="image img-responsive img-rounded">
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
											if ($count%3 != 0) {
												echo '</div>';
											}
										}

										echo '
									</div>
								</div>

								<!-- Following -->
								<div id="following" class="tab-pane fade '.$active_following.' user-posts">
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
											foreach ($following_array  as $follower) {
												if ($follower == '0') {
												# code...
												} else {
													$friend = get_user_from_id($mysqli, $follower);
													echo '
													<div class="col-md-4">
														<div class="media">
															<div class="media-left">
																<a href="user.php?id='.$friend["user_id"].'"><img alt="Imagen de Amigo" src="'.$friend["user_avatar"].'" class="img-circle media-object user-avatar-comment"></a>
															</div>
															<div class="media-body media-right">
																<h2 class="media-heading"><a href="user.php?id='.$friend['user_id'].'">'.$friend['user_name'].'</a></h2>
															</div>
														</div>
													</div>
													';
												}
											}
										}
										echo'
									</div>
								</div>

								<!-- Followers -->
								<div id="followers" class="tab-pane fade user-posts">
									<div class="row">
										';

										$followers = $the_user["user_followers"];
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
											foreach ($followers_array as $follower) {
												if ($follower == '0') {
												# code...
												} else {
													$friend = get_user_from_id($mysqli, $follower);
													echo '
													<div class="col-md-4">
														<div class="media">
															<div class="media-left">
																<a href="user.php?id='.$friend["user_id"].'"><img alt="Imagen de Amigo" src="'.$friend["user_avatar"].'" class="img-circle media-object user-avatar-comment"></a>
															</div>
															<div class="media-body media-right">
																<h2 class="media-heading"><a href="user.php?id='.$friend['user_id'].'">'.$friend['user_name'].'</a></h2>
															</div>
														</div>
													</div>
													
													';
												}
											}
										}
										echo'
									</div>
								</div>

								<!-- Favs Illust -->
								<div id="fav-illust" class="tab-pane fade user-posts">
									<div class="row activity">';

										$id = $the_user['user_favourites'];
										$fav_array = explode(",", $id);
										$fv_count = count($fav_array);
										$count_illust = 0;
										if ($fv_count < 2) {
											echo '
											<div class="row section something-bad">
												<p> Este usuario no ha marcado ninguna ilustración como favorito</p>
											</div>
											';
											$count_illust += 1;
										} else {

											$count = 0;
											foreach ($fav_array as $fav) {
												if ($fav == '0') {
												# code...
												} else {
													$fav_post = get_post($mysqli, $fav);
													$user_data = get_user_from_id($mysqli, $fav_post['post_owner']);
													if ($fav_post['post_type'] == 'Picture') {

														if ($count%3 == 0) {
															echo '<div class="row">';
														}

														echo '
														<div class="col-md-4">
															<div class="friend-illust miniatura">
																<img src="'.$fav_post['post_illust'].'" alt="Avatar" class="image img-responsive img-rounded">
																<div class="middle">
																	<div class="text">
																		<h3><a href="illust.php?id='.$fav_post['post_id'].'">'.$fav_post['post_title'].'</a></h3>
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

														$count_illust += 1;
													}
												}
											}
											if ($count%3 != 0) {
												echo '</div>';
											}
										}
										if ($count_illust == 0) {
											echo '
											<div class="row section something-bad">
												<p> Este usuario no ha marcado ninguna ilustración como favorito</p>
											</div>
											';
										}
										
										echo '
									</div>
								</div>

								<!-- Favs Music -->
								<div id="fav-music" class="tab-pane fade user-posts">
									<div class="row activity">';

										$id = $the_user['user_favourites'];
										$fav_array = explode(",", $id);
										$fv_count = count($fav_array);
										$count_music = 0;
										if ($fv_count < 2) {
											echo '
											<div class="row section something-bad">
												<p> Este usuario no ha marcado ninguna canción como favorito</p>
											</div>
											';
											$count_music += 1;
										} else {
											foreach ($fav_array as $fav) {
												if ($fav == '0') {
												# code...
												} else {
													$fav_post = get_post($mysqli, $fav);
													$user_data = get_user_from_id($mysqli, $fav_post['post_owner']);
													if ($fav_post['post_type'] == 'Song') {
														echo '
														<div class="col-md-6">
															<div class="media">
																<div class="media-left">
																	<a href="song.php?id='.$fav_post['post_id'].'"><img alt="Preview" src="'.$fav_post['post_illust'].'" class="media-object"></a>
																</div>
																<div class="media-right media-body">
																	<h3 class="media-heading"> <a href="song.php?id='.$fav_post['post_id'].'">'.$fav_post['post_title'].'</a> </h3>
																	<p> Tags: ';

																		$tags = $fav_post['post_tags'];
																		$tag_list = explode(",", $tags);

																		if (count($tag_list) > 0) {
																			foreach ($tag_list as $tag) {
																				echo '<a href="search.php?texto='.trim(($tag)).'">'.$tag.'</a> ';
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
														$count_music += 1;
													}
												}
											}
										}

										if ($count_music == 0) {
											echo '
											<div class="row section something-bad">
												<p> Este usuario no ha marcado ninguna canción como favorito</p>
											</div>
											';
										}
										
										echo '
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>';
			}
		}
		?>


	</div>

</body>
</html>