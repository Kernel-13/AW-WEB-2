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
	<link rel="stylesheet" type="text/css" href="css/upload-style.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/codigos.js" ></script>
	<title>LastXanadu</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>

	<div class="container upload">
		<div class="row">
			<form class="form-horizontal" action="illust.php">
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3>Edita tu Canción</h3>
						</div>
						<div class="panel-body">
							<div class="row">

								<!-- Cover Selection -->
								<div class="col-md-6 previsualizacion">
									<div class="col-lg-12">
										<div class="form-group">
											<div class="col-md-12">
												<label for="cover">Escoge un 'cover' (Imagen cuadrada)</label>
												<div class="new-input">
													<input id="cover" type="file" name="file" required="required" accept="image/*" onchange="previewFile()">
												</div>
											</div>
											<div class="row section">
												<div class="col-lg-12">
													<img id="preview" class="img-responsive preview" src="img/preview.png" alt="Tu Ilustración"/>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Title, Description and Submit -->
								<div class="col-md-6 left-side">
									<div class="form-group">
										<div class="col-md-12">
											<label class="sr-only" for="Titulo">Titulo </label>
											<input class="form-control" type="text" id="Titulo" name="title" required="required" placeholder="Nuevo Titulo" maxlength="30">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<label class="sr-only" for="tags">Etiquetas </label>
											<input class="form-control" type="text" id="tags" name="title" required="required" placeholder="Nuevas Etiquetas">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<label class="sr-only" for="descBox">Descripción </label>
											<textarea class="form-control" id="descBox" name="description" required="required" placeholder="Nueva Descripción" maxlength="500"></textarea>
										</div>
									</div>
									<!-- Submit Button -->
									<div class="row">
										<div class="col-lg-12">
											<div >
												<input class="btn btn-warning submitButton" type="submit" name="submit" value="Aplicar Cambios">
											</div>				
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>