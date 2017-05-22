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
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>

	<div class="container">

		<!-- User's Last Posts -->
		<div class="row section">
			<div class="col-lg-12">
				<h2>Mis Archivos Subidos</h2>
				<!-- Tabs -->
				<ul class="nav nav-tabs nav-justified">
					<li class="active" ><a data-toggle="tab" href="#edit-music">Canciones</a></li>
					<li><a data-toggle="tab" href="#edit-illust">Ilustraciones</a></li>
				</ul>

				<!-- Tab Content -->
				<div class="tab-content">
					
					<!-- Music Content -->
					<div id="edit-music" class="tab-pane fade in active user-posts edition">
						<div class="row">
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a1.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 1 </h3>
										<h4 class="media-heading"> <a href="edit_song.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a2.jpg" class="media-object img-rounded" ></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 2 </h3>
										<h4 class="media-heading"> <a href="edit_song.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a3.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 3 </h3>
										<h4 class="media-heading"> <a href="edit_song.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a4.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 4 </h3>
										<h4 class="media-heading"> <a href="edit_song.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a5.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 5 </h3>
										<h4 class="media-heading"> <a href="edit_song.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a6.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 6 </h3>
										<h4 class="media-heading"> <a href="edit_song.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a7.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 7 </h3>
										<h4 class="media-heading"> <a href="edit_song.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a8.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 8 </h3>
										<h4 class="media-heading"> <a href="edit_song.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Illustrations Content -->
					<div id="edit-illust" class="tab-pane fade user-posts edition">
						<div class="row">
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a9.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 9 </h3>
										<h4 class="media-heading"> <a href="edit_illust.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a10.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 10 </h3>
										<h4 class="media-heading"> <a href="edit_illust.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a11.jpg" class="media-object img-rounded" ></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 11 </h3>
										<h4 class="media-heading"> <a href="edit_illust.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a12.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 12 </h3>
										<h4 class="media-heading"> <a href="edit_illust.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a13.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 13 </h3>
										<h4 class="media-heading"> <a href="edit_illust.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a14.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 14 </h3>
										<h4 class="media-heading"> <a href="edit_illust.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a15.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 15 </h3>
										<h4 class="media-heading"> <a href="edit_illust.php"> Editar Información</a> </h4>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="media">
									<div class="media-left">
										<a href="song.php"><img alt="ejemplo" src="img/a16.jpg" class="media-object img-rounded"></a>
									</div>
									<div class="media-right media-body">
										<h3 class="media-heading"> Ejemplo 16 </h3>
										<h4 class="media-heading"> <a href="edit_illust.php"> Editar Información</a> </h4>
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