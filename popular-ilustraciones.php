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
		<div class="col-sm-8">
			<div id="cabecera" class="row"> 
				<div class="col-lg-12">
					<h1>Top 10 Ilustraciones más populares </h1>
				</div>
			</div>
			<hr>

		<?php
		$consulta = "SELECT * FROM users, posts where users.user_id=posts.post_owner and posts.post_type='Picture' order by posts.post_views DESC limit 10";
		$resultado = $mysqli->query($consulta) or die ($mysqli->error."en la linea".(__LINE__-1));
		$cont = 1;
			if($cont<10){
			echo "NO EXISTEN SUFICIENTES CANCIONES";
		}
		else{
			while ($row = mysqli_fetch_row($resultado)){
				echo '<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="top">'.$cont.'</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<img class="img-responsive" src="'.$row[15].'" alt="">
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<h4 class="centar">'.$row[11].'</h4>
						<h5 class="media-heading"><a href="user.php?user='.$row[0].'">'.$row[1].'</a></h5>
						<a class="btn btn-primary" href="song.php">Más información<span class="glyphicon glyphicon-chevron-right"></span></a>
							<h5>'.$row[16].' Visualizaciones</h5>
					</div>
				</div>
				<hr>';
				$cont++;
			}
		}

	$mysqli->close();
		?>
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
	

    
</body>
</html>