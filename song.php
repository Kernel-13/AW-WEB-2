<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
	<link rel="stylesheet" type="text/css" href="css/post-style.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
					$o = $_SESSION['id'];
					$b = mysqli_real_escape_string($mysqli,stripslashes($_POST["comment"]));


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
								<h3>'.$post["post_favourites"].' Likes</h3>
							</div>	
							<div id="author-info">
								<h2>Titulo de la Canción</h2>
								<p><a href="user.php?id='.$post["post_owner"].'">by '.$us["user_name"].'</a></p>
							</div>
							<p>	'.nl2br($post["post_description"]).'</p>
							<p class="gray-text">Tags: ';

								$array = $post["post_tags"];
								$tags = explode(",", $array);
								if (count($tags) > 0) {
									foreach ($tags as $tag) {
										echo '<a href="search.php">'.$tag.'</a> ';
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
								<div class="ratings">
									<a class="btn btn-warning" href=""> <span class="glyphicon glyphicon-star"></span> Marcar como Favorito</a>
									<a class="btn btn-success" href=""> <span class="glyphicon glyphicon-thumbs-up"></span> Like </a>
									<a class="btn btn-danger" href=""> <span class="glyphicon glyphicon-flag"></span> Marcar como Ofensivo</a>
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
							$comentarios = $resultado->fetch_assoc();
							if (is_null($comentarios)) {
								echo '
								<div class="row section something-bad">
									<p> No existen comentarios para esta canción</p>
									<br>
									<p> Se el primero en comentar! </p>
								</div>
								';
							} else {
								foreach ($comentarios as $comment) {
									$owner = get_user_from_id($mysqli, $comment["comment_owner"]);
									echo '
									<div class="row">
										<div class="col-md-12 comment">
											<div class="media">
												<div class="media-left">
													<a href="user.php?id='.$owner["user_id"].'"><img alt="Imagen de Usuario" class="media-object img-rounded user-avatar-comment" src="'.$owner["user_avatar"].'"></a>
												</div>
												<div class="media-body">
													<h4 class="media-heading"> '.$owner["user_name"].' </h4>
													<p>	'.$comment["comment_body"].' </p>
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
							<form method="post" action="song.php">
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

</body>
</html>