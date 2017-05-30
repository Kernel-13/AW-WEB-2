<?php 
	session_start();
	require "includes/db.php";


	//////////////////////////////////////////CONSULTA  ALA BASE DE DATOS////////////////////////////////////
	
	$posts = "SELECT * FROM posts WHERE `post_type` = 'Picture'";
	$resultado = $mysqli->query($posts) or die($mysqli->error."en la línea".(_LINE_-1));	


	//variables de paginado y tamaños
	$numeroColumnas = 2;
	$tamañoColumna = 4;	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
-->
<link rel="stylesheet" type="text/css" href="css/inicio.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<div class="container Novedades-container">
		<div class="row">

			<div class="col-md-12 col-lg-12">

				<?php require "includes/carusel.php"; ?>

				<h1 class="tituloColor">Last<span>Xanadu</span></h1>
				<h2 class="hidden"> Oculto </h2>
				<h3 class="hidden"> Oculto </h3>
				<h4>Te recomienda... con lo que empezamos la pagina web!</h4>
				<div class="row">
					<?php
					$columnas = 0;
					while($columnas<$numeroColumnas){
						echo "<div class='col-sm-6 illust-box'>";
					 	$columnas++;
					 	$cont = 0;
					 		while($cont<$tamañoColumna &&  $registro = $resultado->fetch_array(MYSQLI_BOTH)){
					 			$users = "SELECT * FROM `users` WHERE `user_id` = $registro[post_owner]";
		    					$autores = $mysqli->query($users) or die($mysqli->error."en la línea".(_LINE_-1));
		                    	$autor = $autores->fetch_array(MYSQLI_BOTH);
					 			$cont++;
					 			$textoRecortado = substr($registro['post_description'], 0, 200);
	                    		$longitudString = strlen ( $textoRecortado );
								echo "<div class='desc-box-illust'>
										<h3><a  href='illust.php?id=$registro[post_id]'>$registro[post_title]</a></h3>
									</div>
									<div class='box'>
									<img class='img-rounded img-responsive ilust' alt='John' src=$registro[post_illust]>
										<div class='col-sm-8'>
											<p>visitas: $registro[post_views]      favs: $registro[post_favourites]</p>
										</div>
										<div class='col-sm-4'><a href='user.php?id=$registro[post_owner]'><p>$autor[user_name]</p></a>
										</div>
										<div>
											<div class='panel panel-default'>
												<div class='panel-body'> $textoRecortado"; if($longitudString == 200){
														echo "... (para seguir leyendo pincha en el titulo)";
													}
												echo"</p>
												</div>
											</div>
										</div>
									</div>";}
							echo "</div>";}

					?>
				</div>


				<?php require "includes/PiePagina.php"; ?>
			</div>

		</div>
		

	</div>

</body>
</html>