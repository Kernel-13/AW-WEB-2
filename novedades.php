<?php 
	//////////////////////////////////////////CONEXIÓN A LA BASE DE DATOS////////////////////////////////////
	require "db.php"
	
		
	if(mysqli_connect_errno()){
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}

	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	///booleanos de control
	$boolMusica = $_GET["boolMusica"];
	if($boolMusica==NULL){
		$boolMusica = 1;
	}
	$boolImagen = $_GET["boolImagen"];
	if($boolImagen==NULL){
		$boolImagen = 1;
	}


	//////////////////////////////////////////CONSULTA  ALA BASE DE DATOS////////////////////////////////////
	if($boolImagen == 1 && $boolMusica == 1){
		$posts = "SELECT * FROM posts ORDER BY `posts`.`post_date` DESC";
	}
	elseif($boolImagen == 0 && $boolMusica == 1){
		$posts = "SELECT * FROM posts WHERE `post_type` = 'Song' ORDER BY `posts`.`post_date` DESC";
	}
	elseif($boolImagen == 1 && $boolMusica == 0){
		$posts = "SELECT * FROM posts WHERE `post_type` = 'Picture' ORDER BY `posts`.`post_date` DESC";
	}
	$resultado = $mysqli->query($posts) or die($mysqli->error."en la línea".(_LINE_-1));

	//variables de paginado y tamaños
	$numeroColumnas = 3;
	$tamañoColumna = 2;
	$paginaActual = $_GET["paginaActual"];
	if(!$paginaActual){
		$paginaActual = 1;
	}
	$paginasMax = 10;
	$num_total_registros = $resultado->num_rows;
	$totalArticulosPag = $numeroColumnas*$tamañoColumna;
	$totalPagAux =$num_total_registros/($numeroColumnas*$tamañoColumna);
	$totalPaginas = ceil($totalPagAux);	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
-->
<link rel="stylesheet" type="text/css" href="css/novedades.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<div class="container">

		<div class="col-md-12">

			<h1>Novedades</h1>

			<?php require "includes/novedadesBar.php";
			?>



			<div class="row">
				<?php
				$columnas = 0;
				for($i=$numeroColumnas*$tamañoColumna; $i<$paginaActual*$numeroColumnas*$tamañoColumna; $i++){
					$registro = $resultado->fetch_array(MYSQLI_BOTH);
				}
				 while($columnas<$numeroColumnas){
				 	$columnas++;
					echo "<div class='col-sm-4 illust-box'>";
						$contador = 0;
	                    while($contador<$tamañoColumna &&  $registro = $resultado->fetch_array(MYSQLI_BOTH)){
	                    	$users = "SELECT * FROM `users` WHERE `user_id` = $registro[post_owner]";
	    					$autores = $mysqli->query($users) or die($mysqli->error."en la línea".(_LINE_-1));
	                    	$autor = $autores->fetch_array(MYSQLI_BOTH);
	                    	$contador++;
	                    	$textoRecortado = substr($registro[post_description], 0, 60);
	                    	$longitudString = strlen ( $textoRecortado );
	                    	if($registro['post_type'] == "Picture"){
	                    	//<!--titulo-->
	                            echo "
	                            	<div class='desc-box-illust'>
			                        	<a  href='illust.html'>
			                        		<h3>$registro[post_title]</h3>
			                        	</a>
			                        </div>";   

			                //<!--caja de contenido-->
	                            echo "
	       
	                            	<div class='box media'>
								  		<div class='media-left'>
								  			<a  href='$registro[post_illust]'>
												<img src='$registro[post_illust]' alt='John' class='media-object img-rounded img-responsive ilust'>
											</a>
									 	</div>
									 	<div class='media-body'>
										    <h4 class='media-heading'><a href='user?$registro[post_owner]'>$autor[user_name]</a></h4>
											<p>$textoRecortado";
											if($longitudString == 60){
														echo "... (para seguir leyendo pincha en el titulo)";
													}
												echo"</p>
									  	</div>
									</div>";
	                            }
	                            else{
	                        	//<!--titulo-->
	                            echo "
	                            	<div class='desc-box-illust'>
			                        	<a  href='illust.html'>
			                        		<h3>$registro[post_title]</h3>
			                        	</a>
			                        </div>";

			                    //<!--caja de contenido--><!--https://www.jamendo.com/track/439182/deep-->
			                    echo "
	                            	<div class='audio-box media'>
										<div class='media-left'>
											<a  href=song.html>
												<img class='audio-img img-rounded' src=$registro[post_illust] alt='John'>
											</a>
										</div>
										<div class='media-body panel panel-default'>
											<div class='panel-heading'>
												<a href=user.html><p>$autor[user_name]</p>
												</a>
											</div>
											<div class='panel-body'>
												$textoRecortado";
													if($longitudString == 60){
														echo "... (para seguir leyendo pincha en el titulo)";
													}
												echo"
											</div>
											<div class='panel-footer'>
												<p>visitas: $registro[post_views]</p>
											</div>
										</div>
										<audio class=audio-player controls=controls> <source src=\"$registro[post_song]\" type=audio/mpeg> </audio>
									</div >";
	                        	}
	                    }
					echo "</div>";
					}
				?>
			</div>
			<?php require "includes/PaginadoNovedades.php"; ?>
		</div>
	</div>
	<?php require "includes/PiePagina.php"; 
	$mysqli->close();	?>
</body>
</html>