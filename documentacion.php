<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/post-style.css">
	<title>Mapa del Sitio</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>

	<div class="container map">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h3>Repositorio GitHub</h3><br>
				<a href="https://github.com/Kernel-13/AW-WEB-2" target="_blank"><img src="img/git.png" class="img-responsive img-circle"></a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h3>Memoria del Proyecto</h3><br>
				<a href="Memoria.pdf" target="_blank"><img src="img/pdf.png" class="img-responsive img-circle"></a>
			</div>
		</div>
	</div>

</body>
</html>