<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Merriweather|Muli" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<title>LastXanadu</title>
</head>
<body>

	<?php require 'navbar.php';?>

	<section>
		<div class="container-fluid">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="slides" id="slide-one">
							<div>
								<h2> Here Again </h2>
								<h3> Under the starry sky, someone is waiting...</h3>
							</div>
						</div>
					</div>

					<div class="item">
						<div class="slides" id="slide-two">
							<div>
								<h2> Once More </h2>
								<h3> Under the moon, I'm counting the stars... </h3>
							</div>
						</div>
					</div>

					<div class="item">
						<div class="slides" id="slide-three">
							<div>
								<h2> On an Absolute One-way Street</h2>
								<h3> A lost child looks for the right place... </h3>
							</div>
						</div>
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</section>

	<div class="container">
		<div class="row section">
			<!-- Latest Tracks Uploaded -->
			<div class="col-md-12">
				<div class="row header">
					<div class="col-md-12">
						<h2> Últimas Canciones Agregadas</h2>
					</div>
				</div>
				<div class="row section">
					<div class="col-md-6" id="post-display">
						<div class="media">
							<div class="media-left">
								<a href="song.php"><img src="img/preview.png" class="media-object"></a>
							</div>
							<div class="media-right media-body">
								<h3 class="media-heading"> A New Moon </h3>
								<h4 class="media-heading"> By KilloveFP </h4>
								<p>Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" id="post-display">
						<div class="media">
							<div class="media-left">
								<a href="song.php"><img src="img/preview.png" class="media-object"></a>
							</div>
							<div class="media-right media-body">
								<h3 class="media-heading"> A New Dawn </h3>
								<h4 class="media-heading"> By KilloveFP </h4>
								<p>Tags: Breakcore, Breakbeat, Punk, Lo-fi, Hard Dance</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row section">
					<div class="col-md-6" id="post-display">
						<div class="media">
							<div class="media-left">
								<a href="song.php"><img src="img/preview.png" class="media-object"></a>
							</div>
							<div class="media-right media-body">
								<h3 class="media-heading"> Subterranean Rose </h3>
								<h4 class="media-heading"> By KilloveFP </h4>
								<p>Tags: Glitch Hop, New Wave, Shoegaze, Horrorcore</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" id="post-display">
						<div class="media">
							<div class="media-left">
								<a href="song.php"><img src="img/preview.png" class="media-object"></a>
							</div>
							<div class="media-right media-body">
								<h3 class="media-heading"> Terrible Souvenir </h3>
								<h4 class="media-heading"> By KilloveFP </h4>
								<p>Tags: Breakcore, Breakbeat, Punk, Lo-fi, Hard Dance</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row section">
			<!-- Latest Pictures Uploaded -->
			<div class="col-md-12">
				<div class="row header">
					<div class="col-md-12">
						<h2> Últimas Ilustraciones Agregadas</h2>
					</div>
				</div>
				<div class="row section">
					<div class="col-md-6" id="post-display" id="post-display">
						<div class="media">
							<div class="media-left">
								<a href="illust.php"><img src="img/preview.png" class="media-object"></a>
							</div>
							<div class="media-right media-body">
								<h3 class="media-heading"> Lunatic Princess</h3>
								<h4 class="media-heading"> By KilloveFP </h4>
								<p>Tags: Something, Somewhere, Somehow</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" id="post-display">
						<div class="media">
							<div class="media-left">
								<a href="illust.php"><img src="img/preview.png" class="media-object"></a>
							</div>
							<div class="media-right media-body">
								<h3 class="media-heading"> Earth Phoenix </h3>
								<h4 class="media-heading"> By KilloveFP </h4>
								<p>Tags: Something, Somewhere, Somehow</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row section">
					<div class="col-md-6" id="post-display">
						<div class="media">
							<div class="media-left">
								<a href="illust.php"><img src="img/preview.png" class="media-object"></a>
							</div>
							<div class="media-right media-body">
								<h3 class="media-heading"> Immortal Smoke </h3>
								<h4 class="media-heading"> By KilloveFP </h4>
								<p>Tags: Something, Somewhere, Somehow</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" id="post-display">
						<div class="media">
							<div class="media-left">
								<a href="illust.php"><img src="img/preview.png" class="media-object"></a>
							</div>
							<div class="media-right media-body">
								<h3 class="media-heading"> Unreachable Moon </h3>
								<h4 class="media-heading"> By KilloveFP </h4>
								<p>Tags: Something, Somewhere, Somehow</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>