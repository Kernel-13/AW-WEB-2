<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	
	<link rel="stylesheet" type="text/css" href="css/profile-view.css">	
	<link rel="stylesheet" type="text/css" href="css/timeline.css">	
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>

	<div class="container">

		<!-- Friends Activity -->
		<div class="row section">
			<div class="col-lg-12">
				<h2>Actividad de tus Amigos</h2>

				<!-- Tabs -->
				<ul class="nav nav-tabs nav-justified">
					<li class="active" ><a data-toggle="tab" href="#music">Canciones</a></li>
					<li><a data-toggle="tab" href="#illust">Ilustraciones</a></li>
				</ul>

				<!-- Tab Content -->
				<div class="tab-content">

					<!-- Friends Music Content -->
					<div id="music" class="tab-pane fade in active user-posts">
						<div class="row activity">
							<div class="col-md-6">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="Preview" src="img/preview.png" class="media-object"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> <a href="">A New Moon</a> </h3>
										<h4 class="media-heading"> <a href="">By KilloveFP</a></h4>
										<p> Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="Preview" src="img/preview.png" class="media-object"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> <a href="">A New Moon</a> </h3>
										<h4 class="media-heading"> <a href="">By KilloveFP</a> </h4>
										<p> Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="Preview" src="img/preview.png" class="media-object"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> <a href="">A New Moon</a> </h3>
										<h4 class="media-heading"> <a href="">By KilloveFP</a> </h4>
										<p> Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="Preview" src="img/preview.png" class="media-object"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> <a href="">A New Moon</a> </h3>
										<h4 class="media-heading"> <a href="">By KilloveFP</a> </h4>
										<p> Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="Preview" src="img/preview.png" class="media-object"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> <a href="">A New Moon</a> </h3>
										<h4 class="media-heading"> <a href="">By KilloveFP</a> </h4>
										<p> Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="Preview" src="img/preview.png" class="media-object"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> <a href="">A New Moon</a> </h3>
										<h4 class="media-heading"> <a href="">By KilloveFP</a> </h4>
										<p> Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="Preview" src="img/preview.png" class="media-object"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> <a href="">A New Moon</a> </h3>
										<h4 class="media-heading"> <a href="">By KilloveFP</a> </h4>
										<p> Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="Preview" src="img/preview.png" class="media-object"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> <a href="">A New Moon</a> </h3>
										<h4 class="media-heading"> <a href="">By KilloveFP</a> </h4>
										<p> Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Friends Illustrations Content -->
					<div id="illust" class="tab-pane fade in user-posts">
						<div class="row activity illust-activity">
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a3.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A really really really long title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a12.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A really really really long title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a7.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A really really really long title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a10.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A really really really long title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a16.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A really really really long title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a2.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A really really really long title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a11.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A looooooooooooooooooooooooooooooooonger title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A really really really really really really long title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a16.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A really really really long title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="friend-illust miniatura">
									<img src="img/a16.jpg" alt="Avatar" class="image img-responsive img-rounded">
									<div class="middle">
										<div class="text">
											<h3><a href="illust.php">A really really really long title</a></h3>
											<h4><a href="user.php">by Him</a></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>