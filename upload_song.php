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
		<form class="form-horizontal" action="song.php">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3>Sube aqui tu Canción</h3>
						</div>
						<div class="panel-body">
							<div class="row">

								<!-- Title, Tags and Description -->
								<div class="col-md-6">
									<div class="form-group">
										<div class="col-md-12">
											<label class="sr-only" for="Titulo">Titulo </label>
											<input class="form-control" type="text" name="title" id="Titulo" required="required" placeholder="Titulo de la Canción" maxlength="30">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<label class="sr-only" for="tags">Etiquetas </label>
											<input class="form-control" type="text" id="tags" name="title" required="required" placeholder="Etiquetas (Separadas por comas)">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<label class="sr-only" for="descBox">Descripción </label>
											<textarea class="form-control" id="descBox" name="description" required="required" placeholder="Una breve descripción de la cancion" maxlength="500"></textarea>
										</div>
									</div>
								</div>

								<!-- File Inputs and Preview -->
								<div class="col-md-6 left-side">
									<div class="form-group">
										<div class="col-md-12">
											<label for="song">Selecciona la cancion que deseas publicar</label>
											<div class="new-input">
												<input id="song" type="file" name="file" accept="audio/*" required="required">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<label for="cover">Escoge una imagen para usarla como 'cover' (Debe ser cuadrada)</label>
											<div class="new-input">
												<input id="cover" type="file" name="file" required="required" accept="image/*" onchange="previewFile()">
											</div>
										</div>
									</div>
									<div class="row section">
										<div class="col-lg-12">
											<img id="preview" class="img-responsive preview" src="img/preview.png" alt="Tu Ilustración"/>
										</div>
									</div>
								</div>

							</div>

							<!-- Submit Button -->
							<div class="row section">
								<div class="col-lg-12">
									<div >
										<input class="btn btn-success submitButton" type="submit" name="submit" value="Subir Canción">
									</div>				
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>