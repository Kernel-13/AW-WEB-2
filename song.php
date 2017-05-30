<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/post-style.css">
	<link rel="stylesheet" type="text/css" href="css/buttons.css">
	<script type="text/javascript" src="js/main.js"></script>
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
				<p> No se ha introducido ningun ID </p>
			</div>
			';
		} else { 
			$secure_id = mysqli_real_escape_string($mysqli,stripslashes( $_GET['id']));
			$post = get_post($mysqli, $secure_id);
			if (is_null($post)) {
				echo '
				<div class="row section something-bad">
					<p> La canción con el ID intoducido no existe o ha sido eliminada </p>
				</div>
				';
			} else {
				
				if ($mysqli->query("UPDATE posts SET post_views = post_views + 1 WHERE post_id='".$post['post_id']."'") === TRUE) {
					// OK
				}

				if(isset($_POST["comment"]) && isset($_SESSION['username'])){
					$i = $post["post_id"];
					$o = $_SESSION['user_id'];
					$b = mysqli_real_escape_string($mysqli,htmlspecialchars(trim(strip_tags($_POST["comment"]))));

					$query = "INSERT INTO comments(comment_post, comment_owner, comment_body) VALUES('$i', '$o', '$b')";
					if ($mysqli->query($query) === TRUE) {
						echo '
						<div class="row section something-bad">
							<p> El comentario se ha publicado con exito! </p>
						</div>
						';
					} else {
						echo '
						<div class="row section something-bad">
							<p> Hubo un problema a la hora de publicar tu comentario </p>
						</div>
						';
					}
				}

				if ($post['post_type'] == 'Song') {
					$us = get_user_from_id($mysqli, $post["post_owner"]);
					echo '

					<!-- Song Info -->
					<div class="row" id="song-info">
						<div class="col-md-12">	
							<div class="points">
								<h3>'.$post["post_views"].' Visitas</h3>
							</div>	
							<div id="author-info">
								<h2>'.$post["post_title"].'</h2><br>
								<p><a href="user.php?id='.$post["post_owner"].'">by '.$us["user_name"].'</a></p>
							</div>
							<p>	'.nl2br($post["post_description"]).'</p><br>
							<p class="gray-text">Tags: ';

								$array = $post["post_tags"];
								$tags = explode(",", $array);
								if (count($tags) > 0) {
									foreach ($tags as $tag) {
										echo '<a href="search.php?texto='.urlencode(trim($tag)).'">'.$tag.'</a> ';
									}
								} else {
									echo 'No Tags';
								}
								echo '
							</p>
						</div>
					</div>

					<!-- Song Player / Cover -->
					<div class="row section">
						<div class="col-md-9 col-sm-8 col-xs-8" id="canvas-div">
							<canvas id="canvas" width="847" height="262"></canvas>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-4">
							<img alt="Cover de la Canción"  id="song-cover" class="img-responsive img-rounded" src="'.$post["post_illust"].'">
						</div>
						<div class="col-md-12">
							<audio src="'.$post["post_song"].'" id="audio" controls="controls" controlsList="nodownload">HTML5 Audio element not supported</audio>
						</div>';
						if (isset($_SESSION['username'])) {
							echo '
							<div class="col-md-12">
								<div class="ratings">';

									if (!isset($_SESSION['user_id'])) {
										echo '
										<a class="btn btn-follow" href="follow.php?id='.$us["user_id"].'"> <span class="glyphicon glyphicon-eye-open"></span>  Seguir a '.$us["user_name"].'</a>
										';
									} else {


										if ($_SESSION['user_type'] == 'Admin' || $post["post_owner"] == $_SESSION['user_id']) {
											echo '
											<a class="btn btn-danger" href="delete.php?id='.$post["post_id"].'"> <span class="glyphicon glyphicon glyphicon-trash"></span> Borrar esta publicación</a>
											';
										}

										if (!is_following($mysqli, $us["user_id"] ,$_SESSION['user_id'])) {
											echo '
											<a class="btn btn-follow" href="follow.php?id='.$us["user_id"].'"> <span class="glyphicon glyphicon-eye-open"></span>  Seguir a '.$us["user_name"].'</a>
											';
										} else {
											echo '
											<a class="btn btn-flag" href="follow.php?id='.$us["user_id"].'"> <span class="glyphicon glyphicon-eye-open"></span>  Dejar de Seguir a '.$us["user_name"].'</a>
											';
										}

										if (!is_favourite($mysqli, $_SESSION['user_id'], $post["post_id"])) {
											echo '
											<a class="btn btn-warning" href="fav.php?id='.$post["post_id"].'"> <span class="glyphicon glyphicon-star"></span> Marcar como Favorito</a>
											';
										} else {
											echo '
											<a class="btn btn-warning" href="fav.php?id='.$post["post_id"].'"> <span class="glyphicon glyphicon-star"></span> Borrar de Favoritos</a>
											';
										}
										echo'
										<a class="btn btn-danger" href="flagging.php?id='.$post["post_id"].'"> <span class="glyphicon glyphicon-flag"></span> Marcar como Ofensivo</a>';
									}

									

									echo'
								</div>
							</div>
							';
						}

						echo '
					</div>

					<!-- Song Comments -->
					<div class="row section">

						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<h3>Comentarios</h3>
								</div>
							</div>';

							$query = "SELECT * FROM comments WHERE comment_post='".$post['post_id']."' ORDER BY comment_date DESC";
							$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
							if (is_null($resultado) || mysqli_num_rows($resultado)==0) {
								echo '
								<div class="row section something-bad">
									<p> No existen comentarios para esta canción</p>
									<br>
									<p> Se el primero en comentar! </p>
								</div>
								';
							} else {
								while ($comment = $resultado->fetch_assoc()) {
									$owner = get_user_from_id($mysqli, $comment["comment_owner"]);
									echo '
									<div class="row">
										<div class="col-md-12 comment">
											<div class="media">
												<div class="media-left">
													<a href="user.php?id='.$owner["user_id"].'"><img alt="Imagen de Usuario" class="media-object img-rounded user-avatar-comment" src="'.$owner["user_avatar"].'"></a>
												</div>
												<div class="media-body">
													<h4 class="media-heading"> <a href="user.php?id='.$owner["user_id"].'">'.$owner["user_name"].'</a> </h4>
													<p>	'.nl2br($comment["comment_body"]).' </p>
												</div>
											</div>
										</div>
									</div>';
								}
							}
							echo '
						</div>
					</div>';

					if (isset($_SESSION['username'])) {
						echo '
						<!-- Post a Comment -->
						<div class="row section" id="post-a-commment">
							<form method="post" action="'.$_SERVER["PHP_SELF"].'?id='.$post["post_id"].'">
								<div class="col-md-2">
									<label for="make-comment">Publica un Comentario:</label>
								</div>
								<div class="col-md-10">
									<textarea id="make-comment" name="comment" class="form-control" required="required" placeholder="Escribe tu comentario aqui..." maxlength="500"></textarea>
									<input class="btn btn-danger" type="submit" name="submit" value="Publicar comentario">
								</div>
							</form>
						</div>
						';
					}
				} else {
					echo '
					<div class="row section something-bad">
						<p> El ID introducido no es de tipo "Canción" </p>
					</div>
					';
				}
			}
		}
		?>
	</div>
	<?php 
	mysqli_close($mysqli);
	?>

</body>
</html>