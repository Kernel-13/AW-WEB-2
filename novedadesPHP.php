<?php 
	//////////////////////////////////////////CONEXIÓN A LA BASE DE DATOS////////////////////////////////////
	$hostname = '127.0.0.1';
	$usuario = 'root'; 
	$password = ""; 
	$basededatos = 'lastxanadu';
	$mysqli = new mysqli($hostname, $usuario, $password, $basededatos);
	
		
	if(mysqli_connect_errno()){
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}
	//////////////////////////////////////////CONSULTA  ALA BASE DE DATOS////////////////////////////////////
	$posts = "SELECT * FROM posts ORDER BY `posts`.`post_date` DESC";
	$resultado = $mysqli->query($posts) or die($mysqli->error."en la línea".(_LINE_-1));		
			
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

			<?php require "includes/novedadesBar.php"; ?>


			<div class="row">
				<div class="col-sm-4 illust-box">
					<?php 
					$contador = 0;
                    while($contador<4 && $registro = $resultado->fetch_array(MYSQLI_BOTH)){
                    	$users = "SELECT * FROM `users` WHERE `user_id` = $registro[post_owner]";
    					$autores = $mysqli->query($users) or die($mysqli->error."en la línea".(_LINE_-1));
                    	$autor = $autores->fetch_array(MYSQLI_BOTH);
                    	$contador++;

                    	if($registro['post_type'] == "Picture"){
                    	//<!--titulo-->
                            echo "
                            	<div class=\"desc-box-illust\">
		                        	<a  href=\"illust.html\">
		                        		<h3>$registro[post_title] $contador</h3>
		                        	</a>
		                        </div>";   

		                //<!--caja de contenido-->
                            echo "
       
                            	<div class=\"box media\">
							  		<div class=\"media-left\">
							  			<a  href=\"$registro[post_illust]\">
											<img src=\"$registro[post_illust]\" alt=\"John\" class=\"media-object img-rounded img-responsive ilust\">
										</a>
								 	</div>
								 	<div class=\"media-body\">
									    <h4 class=\"media-heading\"><a href=\"user?$registro[post_owner]\">$autor[user_name]</a></h4>
										<p>$registro[post_description]</p>
									    <div class=\"progress\">
											<div id=\"barra\" class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:90%\">
												<span class=\"sr-only\">9/10</span>
												puntuacion: 9/10
											</div>
										</div>
								  	</div>
								</div>
                            	";
                            }
                            else{
                        	//<!--titulo-->
                            echo "
                            	<div class=\"desc-box-illust\">
		                        	<a  href=\"illust.html\">
		                        		<h3>$registro[post_title] $contador</h3>
		                        	</a>
		                        </div>";

		                    //<!--caja de contenido--><!--https://www.jamendo.com/track/439182/deep-->
		                    echo "
                            	<div class=audio-box media>
									<div class=media-left>
										<a  href=song.html>
											<img class=\"ilust\" src=\"$registro[post_illust]\" alt=\"John\">
										</a>
									</div>
									<div class=media-body panel panel-default>
										<div class=panel-heading>
											<a href=user.html><p>$autor[user_name]</p>
											</a>
										</div>
										<div class=panel-body>
											$registro[post_description]
										</div>
										<div class=panel-footer>
											<div class=progress>
												<div class=progress-bar role=progressbar aria-valuenow=60 aria-valuemin=0 aria-valuemax=100 style=width:65%>
													<span class=sr-only>6.5/10</span>
													puntuacion: 6.5/10
												</div>
											</div>
										</div>
									</div>
									<audio class=audio-player controls=controls> <source src=\"$registro[post_song]\" type=audio/mpeg> </audio>
								</div >
                        	";
                        }
                    }    
                    ?>
				</div>

				<div class="col-sm-4 illust-box">
					<?php 
					$contador = 4;
                    while($contador<8 && $registro = $resultado->fetch_array(MYSQLI_BOTH)){
                    	$users = "SELECT * FROM `users` WHERE `user_id` = $registro[post_owner]";
    					$autores = $mysqli->query($users) or die($mysqli->error."en la línea".(_LINE_-1));
                    	$autor = $autores->fetch_array(MYSQLI_BOTH);
                    	$contador++;

                    	if($registro['post_type'] == "Picture"){
                    		//<!--titulo-->
                            echo "
                            	<div class=\"desc-box-illust\">
		                        	<a  href=\"illust.html\">
		                        		<h3>$registro[post_title] $contador</h3>
		                        	</a>
		                        </div>";   

		               		//<!--caja de contenido-->
                            echo "
                            	<div class=\"box media\">
							  		<div class=\"media-left\">
							  			<a  href=\"$registro[post_illust]\">
											<img src=\"$registro[post_illust]\" alt=\"John\" class=\"media-object img-rounded img-responsive ilust\">
										</a>
								 	</div>
								 	<div class=\"media-body\">
									    <h4 class=\"media-heading\"><a href=\"user?$registro[post_owner]\">$autor[user_name]</a></h4>
										<p>$registro[post_description]</p>
									    <div class=\"progress\">
											<div id=\"barra\" class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:90%\">
												<span class=\"sr-only\">9/10</span>
												puntuacion: 9/10
											</div>
										</div>
								  	</div>
								</div>
                            	";
                            }
                        else{
                        	//<!--titulo-->
                            echo "
                            	<div class=\"desc-box-illust\">
		                        	<a  href=\"illust.html\">
		                        		<h3>$registro[post_title] $contador</h3>
		                        	</a>
		                        </div>";

		                    //<!--caja de contenido--><!--https://www.jamendo.com/track/439182/deep-->
		                    echo "
                            	<div class=audio-box media>
									<div class=media-left>
										<a  href=song.html>
											<img class=\"ilust\" src=\"$registro[post_illust]\" alt=\"John\">
										</a>
									</div>
									<div class=media-body panel panel-default>
										<div class=panel-heading>
											<a href=user.html><p>$autor[user_name]</p>
											</a>
										</div>
										<div class=panel-body>
											$registro[post_description]
										</div>
										<div class=panel-footer>
											<div class=progress>
												<div class=progress-bar role=progressbar aria-valuenow=60 aria-valuemin=0 aria-valuemax=100 style=width:65%>
													<span class=sr-only>6.5/10</span>
													puntuacion: 6.5/10
												</div>
											</div>
										</div>
									</div>
									<audio class=audio-player controls=controls> <source src=\"$registro[post_song]\" type=audio/mpeg> </audio>
								</div >





								<div class=desc-box-illust>
									<a  href=song.html>
										<h3>Deep</h3>
									</a>
								</div>
								<div class=audio-box media>
									<div class=media-left>
										<a  href=song.html>
											<img class= ilust alt=Blind Violet src=img/novedades/musica/blindViolet.jpg>
										</a>
									</div>
									<div class=media-body panel panel-default>
										<div class=panel-heading><a href=user.html><p>Blind Violet</p></a>
										</div>
										<div class=panel-body>
											Representa un cancion de ejemplo y este seria su texto descriptivo.
										</div>
										<div class=panel-footer>
											<div class=progress>
												<div class=progress-bar role=progressbar aria-valuenow=60 aria-valuemin=0 aria-valuemax=100 style=width:65%>
													<span class=sr-only>6.5/10</span>
													puntuacion: 6.5/10
												</div>
											</div>
										</div>
									</div>
									<audio class=audio-player controls=controls> <source src=novedades/musica/Blind_Violet_-_Deep.mp3 type=audio/mpeg> </audio>
								</div >
                        	";
                        }
                    }    
                    ?>
				</div>

				<div class="col-sm-4 illust-box">
					<div class="desc-box-illust">
						<a  href="song.html">
							<h3>Deep</h3>
						</a>
					</div>
					<div class="audio-box media">
						<div class="media-left">
							<a  href="song.html">
								<img class="audio-img img-rounded" alt="Blind Violet" src="img/novedades/musica/blindViolet.jpg">
								<!--https://www.jamendo.com/track/439182/deep-->
							</a>
						</div>
						<div class="media-body panel panel-default">
							<div class="panel-heading"><a href="user.html"><p>Blind Violet</p></a>
							</div>
							<div class="panel-body">
								Representa un cancion de ejemplo y este seria su texto descriptivo.
							</div>
							<div class="panel-footer">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:65%">
										<span class="sr-only">6.5/10</span>
										puntuacion: 6.5/10
									</div>
								</div>
							</div>
						</div>
						<audio class="audio-player" controls="controls"> <source src="novedades/musica/Blind_Violet_-_Deep.mp3" type="audio/mpeg"> </audio>
					</div >
					<div class="desc-box-illust">
						<a  href="song.html">
							<h3>We got the love</h3>
						</a>
					</div>
					<div class="audio-box media">
						<div class="media-left">
							<a  href="song.html">
								<img class="audio-img img-rounded" alt="We got the love(portada)" src="img/novedades/musica/themoose.jpg">
							</a>
						</div>
						<div class="media-body panel panel-default">
							<div class="panel-heading"><a href="user.html"><p>The Moose</p></a>
							</div>
							<div class="panel-body">
								Representa un cancion de ejemplo y este seria su texto descriptivo.
							</div>
							<div class="panel-footer">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:65%">
										<span class="sr-only">6.5/10</span>
										puntuacion: 6.5/10
									</div>
								</div>
							</div>
						</div>
						<audio class="audio-player" controls="controls"> <source src="novedades/musica/The_Moose_-_We_Got_The_Love.mp3" type="audio/mpeg"> </audio>
						<!--https://www.jamendo.com/track/1414990/we-got-the-love-->
					</div >
					<div class="desc-box-illust">
						<a  href="song.html">
							<h3>Runaway</h3>
						</a>
					</div>
					<div class="audio-box media">
						<div class="media-left">
							<a  href="song.html">
								<img class="audio-img img-rounded" alt="Runaway(Portada)" src="img/novedades/musica/Runaway.jpg">
							</a>
						</div>
						<div class="media-body panel panel-default">
							<div class="panel-heading"><a href="user.html"><p>Alyssa Riley</p></a>
							</div>
							<div class="panel-body">
								Representa un cancion de ejemplo y este seria su texto descriptivo.
							</div>
							<div class="panel-footer">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:65%">
										<span class="sr-only">6.5/10</span>
										puntuacion: 6.5/10
									</div>
								</div>
							</div>
						</div>
						<audio class="audio-player" controls="controls"> <source src="novedades/musica/Alyssa_Riley_-_Runaway.mp3" type="audio/mpeg"> </audio>
						<!--https://alyssariley.bandcamp.com/track/runaway-->
					</div >
					<div class="desc-box-illust">
						<a  href="song.html">
							<h3>Cali</h3>
						</a>
					</div>
					<div class="audio-box media">
						<div class="media-left">
							<a  href="song.html">
								<img class="audio-img img-rounded" alt="Cali(portada)" src="img/novedades/musica/Cali.jpg">
							</a>
						</div>
						<div class="media-body panel panel-default">
							<div class="panel-heading"><a href="user.html"><p>Barefoot McCoy</p></a>
							</div>
							<div class="panel-body">
								Representa un cancion de ejemplo y este seria su texto descriptivo.
							</div>
							<div class="panel-footer">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:65%">
										<span class="sr-only">6.5/10</span>
										puntuacion: 6.5/10
									</div>
								</div>
							</div>
						</div>
						<audio class="audio-player" controls="controls"> <source src="novedades/musica/Barefoot_McCoy_-_Cali.mp3" type="audio/mpeg"> </audio>
						<!--https://www.jamendo.com/track/1428765/cali-->
					</div >
				</div>

			</div>
			<?php require "includes/PaginadoNovedades.php"; ?>
		</div>
	</div>
	<?php require "includes/PiePagina.php"; 
	$mysqli->close();	?>
</body>
</html>