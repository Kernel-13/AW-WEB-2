<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Oxygen" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
	<link rel="stylesheet" type="text/css" href="css/post-style.css">
	<title>LastXanadu</title>
</head>
<body>
	<?php require 'navbar.php';?>

	<div class="container">
		<div class="row">
			<!-- Illust, Description and Tags-->
			<div class="col-md-8 col-sm-6 illust-text">
				<div>
					<div id="author-info">
						<h2>Illustration Title</h2>
						<p><a href="user.php">by KilloveFP</a></p>
					</div>
					<p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
					<p class="gray-text">Tags: <a href="">this</a>, <a href="">will</a>, <a href="">be</a>, <a href="">a</a>, <a href="">list</a>, <a href="">of</a>, <a href="">tags</a></p>
				</div>
				<div>
					<img id="illust" class="img-rounded img-responsive" src="img/a.jpg">
				</div>
				<div id="ratings">
					
				</div>
			</div>

			<!-- Comment Section -->
			<aside class="col-md-4 col-sm-6">
				<h3>Comentarios</h3>
				<div class="comment">
					<div class="media">
						<div class="media-left">
							<a href="user.php"><img id="user-avatar-comment" class="media-object img-rounded" src="img/solid.png"></a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"> User #1 </h4>
							<p>	What I love and what I believe rots away; even what was broken before. Even if I held it close it’d turn to ashes. Is dead salvation? Is dead compensation? Living can also be a curse after all. I mean, people are born while crying, aren’t they?
							</p>
						</div>
					</div>
				</div>
				<div class="comment">
					<div class="media">
						<div class="media-left">
							<a href="user.php"><img id="user-avatar-comment" class="media-object img-rounded" src="img/solid3.png"></a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"> User #2 </h4>
							<p>	I’m falling endlessly. They are lined up, with their needle blades over their heads.
								They twist around my body. Ah, their bodies are burning with real love…
								They are my soul. Myself in my cursed dolls…
							</p>
						</div>
					</div>
				</div>
				<div class="comment">
					<div class="media">
						<div class="media-left">
							<a href="user.php"><img id="user-avatar-comment" class="media-object img-rounded" src="img/solid2.png"></a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"> User #3 </h4>
							<p>	Ah, can’t you see it? Can’t you feel it?
								If that’s the worst end, kneel down and pray.
								It’s too late for regrets, repentance and the like now.
								Hell is not just one place – where do you want to go?
							</p>
						</div>
					</div>
				</div>
				<div class="comment">
					<div class="media">
						<div class="media-left">
							<a href="user.php"><img id="user-avatar-comment" class="media-object img-rounded" src="img/solid4.png"></a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"> User #4 </h4>
							<p>	Yeah, It's Lunatic Time! Welcome to the Madness World!
							</p>
						</div>
					</div>
				</div>
			</aside>
		</div>

		<!-- Posting a Comment -->
		<div class="row section" id="post-a-commment">
			<form method="post" action="#">
				<div class="col-md-2">
					<span>Publica un Comentario:</span>
				</div>
				<div class="col-md-10">
					<textarea id="make-comment" placeholder="Escribe aqui tu comentario..."></textarea>
					<input class="btn btn-danger" type="submit" name="submit" value="Publicar comentario">
				</div>
			</form>
		</div>
	</div>

</body>
</html>