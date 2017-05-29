<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
	<link rel="stylesheet" type="text/css" href="css/popular.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; 
	require ("includes/db.php");
    ?> 
	
    <!--AQUI-->  
    <div class="container">
		<div class="col-md-8 col-xs-12">
			<div class="row"> 

				<div id= "cabecera">
					<h1>Top 10 Ilustraciones más populares </h1>
					<hr>
				</div>
		<?php
			$consulta = "SELECT * FROM users, posts where users.user_id=posts.post_owner and posts.post_type='Picture' order by posts.post_views DESC limit 10";
			$resultado = $mysqli->query($consulta) or die ($mysqli->error."en la linea".(__LINE__-1));
			$cont = 1;
		
				while ($row = $resultado->fetch_assoc()){
					echo '<div class="ficha">
						<div class="col-md-6 col-xs-12">
							<div class="col-md-2">
								<p class="top">'.$cont.'</p>
							</div>
							<div class="col-md-10">
								<img class="imgEstilo" src="'.$row["post_illust"].'" alt="imagen">
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12 box-text">
							<h4>'.$row["post_title"].'</h4>
							<h5><a href="user.php?id='.$row["user_id"].'">'.$row["user_name"].'</h5>
							<a class="btn btn-primary" href="song.php?id='.$row["post_id"].'">Más información<span class="glyphicon glyphicon-chevron-right"></span></a>
								<h5>'.$row["post_views"].' Visualizaciones</h5>
						</div>
					  </div>
					<hr>
				';
				$cont++;
			}
		$mysqli->close();
		?>
			</div>
		</div>

		<!--Ultimos comentarios-->
			<div class="col-sm-4">
				<div class="list-group">
					<h3>Noticias</h3>
					<h4 class="headercomentario">Playa</h4>
					<p>¿Una ilustracion infantil? Sea como sea se lleva el primer puesto de los mas vistos de esta semana.</p>
					<h4 class="headercomentario">Ardilla</h4>
					<p>En la segunda posición pero ha recibido las mejores votaciones de la semana</p>
					<h4 class="headercomentario">Buzon</h4>
					<p>El arte en una ilustración, se ha llevado los mejores comentarios.</p>
				</div>
			</div>
		</div>
	
	<?php require "includes/PiePagina.php"; ?>
    
</body>
</html>