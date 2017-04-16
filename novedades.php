<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
-->
<link rel="stylesheet" type="text/css" href="css/novedades.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>LastXanadu</title>
<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<?php require 'navbar.php';?>

	<div class="container Novedades-container" style="margin-top:50px;">
		<div class="row">

			<div class="col-md-2">
			</div>

			<div class="col-md-8">

				<h1 align = center>Novedades</h1>

				<nav class="navbar navbar-inverse" id="botones de Novedades" align = center>
					<ul class="nav navbar-nav">
						<li class="active"><a href="novedades.html">Todo</a></li>
						<li><a href="novedades-musica.html">Solo musica</a></li>
						<li><a href="novedades-ilustraciones.html">Solo ilustraciones</a></li>
					</ul>
				</nav>

				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
						<li data-target="#myCarousel" data-slide-to="3"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active" align="center">
							<img src="novedades/musica/stormtrooper.jpg" alt="Chania" width="250" height="225">
							<audio id="audio-player" controls="controls"> <source src="novedades/musica/Monster_Cyborg_-_space_troops.mp3" type="audio/mpeg"> </audio>
							<p>Un stormtrooper triunfa con su cancion "los blasters hacen pium pium"</p>
						</div>

						<div class="item" align="center">
							<img src="novedades/img/chewaca.jpg" alt="Chania" width="175" height="345">
							<p>El garabato de John ¿broma o arte?</p>
						</div>

						<div class="item" align="center">
							<img src="img/heca2.jpg" alt="Flower" width="460" height="345">
							<p>La primera imagen de LastXanadu</p>
						</div>

						<div class="item" align="center">
							<img src="novedades/musica/sparta.jpg" alt="Flower" width="390" height="225">
							<audio id="audio-player" controls="controls"> <source src="resources/newfuries.mp3" type="audio/mpeg"> </audio>
							<p>"300 ips no entran en 8 bits" de Leonidas.</p>
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

				<div class="row">
					<div class="col-sm-6 illust-box">
						<div class="desc-box-illust">
							<h3>Otoño</h3>
						</div>
						<div align="center">
						<img id="ilust" class="img-rounded img-responsive" src="novedades/img/otoño.jpg" width="200" height="205">
							<div class="col-sm-8">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:90%">
										<span class="sr-only">9/10</span>
										puntuacion: 9/10
									</div>
								</div>
							</div>
							<div class="col-sm-4"><a href=""><p>John</p></a>
							</div>
							<div>
								<br>
								<br>
								<p>Representa un ilustracion de ejemplo y este seria su texto descriptivo.</p>
							</div>
						</div>
						<div class="desc-box-illust">
							<h3>King Kong</h3>
						</div>
						<div align="center">
							<img id="ilust" class="img-rounded img-responsive" src="novedades/img/kingkong.jpg" width="200" height="205">
							<div class="col-sm-8">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:50%">
										<span class="sr-only">5/10</span>
										puntuacion: 5/10
									</div>
								</div>
							</div>
							<div class="col-sm-4"><a href=""><p>Peter</p></a>
							</div>
							<div>
								<br>
								<br>
								<br>
								<p>Representa un ilustracion de ejemplo y este seria su texto descriptivo.</p>
							</div>
						</div>

						<div class="desc-box-illust">
							<h3>Las vacas locas</h3>
						</div>
						<div align="center">
							<img id="ilust" class="img-rounded img-responsive" src="novedades/img/vacas.jpg" width="200" height="205">
							<div class="col-sm-8">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
										<span class="sr-only">6/10</span>
										puntuacion: 6/10
									</div>
								</div>
							</div>
							<div class="col-sm-4"><a href=""><p>John</p></a>
							</div>
							<div>
								<br>
								<br>
								<br>
								<p>Representa un ilustracion de ejemplo y este seria su texto descriptivo.</p>
							</div>
						</div>
						<div class="desc-box-illust">
							<h3>Los tres colores</h3>
						</div>
						<div align="center">
							<img id="ilust" class="img-rounded img-responsive" src="novedades/img/lostresmeones.jpg" width="200" height="205">
							<div class="col-sm-8">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
										<span class="sr-only">6/10</span>
										puntuacion: 6/10
									</div>
								</div>
							</div>
							<div class="col-sm-4"><a href=""><p>Jose</p></a>
							</div>
							<div>
								<br>
								<br>
								<br>
								<p>Representa un ilustracion de ejemplo y este seria su texto descriptivo.</p>
							</div>
						</div>
					</div>

					<div class="col-sm-6 illust-box">
						<div class="desc-box-illust">
							<h3>Deep</h3>
							<p></p>
						</div>
						<div align="center">
							<img id="ilust" class="img-rounded" src="novedades/musica/blindViolet.jpg" width="300" height="180">
							<audio id="audio-player" controls="controls"> <source src="novedades/musica/Blind_Violet_-_Deep.mp3" type="audio/mpeg"> </audio>
							<div class="col-sm-8">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:65%">
										<span class="sr-only">6.5/10</span>
										puntuacion: 6.5/10
									</div>
								</div>
							</div>
							<div class="col-sm-4"><a href=""><p>Blind Violet</p></a>
							</div>
							<div>
								<br>
								<br>
								<p>Representa una cancion de ejemplo y este seria su texto descriptivo.</p>
							</div>
						</div >
						<div class="desc-box-illust">
							<h3>Runaway</h3>
							<p></p>
						</div>
						<div align="center">
							<img id="ilust" class="img-rounded" src="novedades/musica/Runaway.jpg" width="300" height="180">
							<audio id="audio-player" controls="controls"> <source src="novedades/musica/Alyssa_Riley_-_Runaway.mp3" type="audio/mpeg"> </audio>
							<div class="col-sm-8">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:85%">
										<span class="sr-only">8.5/10</span>
										puntuacion: 8.5/10
									</div>
								</div>
							</div>
							<div class="col-sm-4"><a href=""><p>Alyssa Riley</p></a>
							</div>
							<div>
								<br>
								<br>
								<p>Representa una cancion de ejemplo y este seria su texto descriptivo.</p>
							</div>
						</div>
						<div class="desc-box-illust">
							<h3>We got the love</h3>
							<p></p>
						</div>
						<div align="center">
							<img id="ilust" class="img-rounded" src="novedades/musica/themoose.jpg" width="300" height="180">
							<audio id="audio-player" controls="controls"> <source src="novedades/musica/The_Moose_-_We_Got_The_Love.mp3" type="audio/mpeg"> </audio>
							<div class="col-sm-8">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:70%">
										<span class="sr-only">7/10</span>
										puntuacion: 7/10
									</div>
								</div>
							</div>
							<div class="col-sm-4"><a href=""><p>The Moose</p></a>
							</div>
							<div>
								<br>
								<br>
								<p>Representa una cancion de ejemplo y este seria su texto descriptivo.</p>
							</div>
						</div>
						<div class="desc-box-illust">
							<h3>Cali</h3>
							<p></p>
						</div>
						<div align="center">
							<img id="ilust" class="img-rounded" src="novedades/musica/cali.jpg" width="300" height="180">
							<audio id="audio-player" controls="controls"> <source src="novedades/musica/Barefoot_McCoy_-_Cali.mp3" type="audio/mpeg"> </audio>
							<div class="col-sm-8">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:72%">
										<span class="sr-only">7.2/10</span>
										puntuacion: 7.2/10
									</div>
								</div>
							</div>
							<div class="col-sm-4"><a href=""><p>Barefoot McCoy</p></a>
							</div>
							<div>
								<br>
								<br>
								<p>Representa una cancion de ejemplo y este seria su texto descriptivo.</p>
							</div>
						</div>
					</div>

				</div>

				<ul class="pager">
					<!--		  <li class="previous"><a href="novedades.html">Previous</a></li> -->

					<ul class="pagination pagination-sm" align="center">
						<li class="active"><a href="novedades.html">1</a></li>
						<li><a href="novedadesP2.html">2</a></li>
						<li><a href="novedadesP3.html">3</a></li>
						<li><a href="novedadesP4.html">4</a></li>
						<li><a href="novedadesP5.html">5</a></li>
						<li><a href="novedadesP6.html">...</a></li>
						<li><a href="novedadesP9.html">9</a></li>
						<li><a href="novedadesP10.html">10</a></li>
					</ul>

					<li class="next"><a href="novedadesP2.html">Next</a></li>
				</ul>

				<ul class="list-inline" align="center">
					<li><a href="quienesSomos.html">¿Quienes somos?</a></li>
					<li><a href="contacto.html">Contacta con nosotros</a></li>
					<li><a href="dondeEncontrarnos.html">Donde encontrarnos</a></li>
					<li><a href="autoresWeb.html">Autores web</a></li>
					<li><a href="actualizaciones.html">Actualizaciones y novedades de la pagina</a></li>
				</ul>
			</div>

			<div class="col-md-2"></div>
		</div>
		

	</div>

</body>
</html>