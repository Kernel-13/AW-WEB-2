<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="css/popular.css">
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
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
        
				<div id="cabecera">
		                <h1>Top 10 canciones más populares </h1>
		                <hr>
		        </div>
	<?php
		$consulta = "SELECT * FROM users, posts where users.user_id=posts.post_owner and posts.post_type='Song' order by posts.post_views DESC limit 10";
		$resultado = $mysqli->query($consulta) or die ($mysqli->error."en la linea".(__LINE__-1));
		$cont = 1;
		
			while ($row = mysqli_fetch_row($resultado)){
				echo "<div class='ficha'>
						<div class='col-md-6 col-xs-12'>
							<div class='col-md-2'>
								<p class='top'>$cont</p>
							</div>
							<div class='col-md-10'>
								<img class='imgEstilo' src=$row[15] alt=''>
							</div>
						</div>
						
						<div class='col-md-6 col-xs-12 box-text'>
							<h4>$row[11]</h4>
							<h5><a href='user.php?id=$row[0]'>$row[1]</a></h5>
							<a class='btn btn-primary' href='song.php?id=$row[0]'>Más información<span class='glyphicon glyphicon-chevron-right'></span></a>
								<h5>$row[16] Reproducciones</h5>
						</div>
					  </div>
					<hr>
				";
				$cont++;
			}

		$mysqli->close();
		?>
			</div>
		</div>
		
		<!--Ultimos comentarios-->
		<div class="col-md-4 col-sm-12">
			<div class="list-group">
				<h3>Noticias</h3>
				<h4 class="headercomentario">Guitarra</h4>
				<p>Esta semana se pone en cabeza Guitarra como la canción mas escuchada aunque sus comentarios no han sido los mejores.</p>
				<h4 class="headercomentario">Rana</h4>
				<p>Esta canción le pisa los talones muy de cerca al top 1 de esta semana.</p>
				<h4 class="headercomentario">Mujer</h4>
				<p>Se situa en el tercer puesto pero ha recibido los mejores comentarios de esta semana.</p>
			</div>
		</div>
	</div>

	
</body>
</html>
