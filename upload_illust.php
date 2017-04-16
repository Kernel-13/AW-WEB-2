<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
	<link rel="stylesheet" type="text/css" href="css/upload-style.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css?family=Muli|Open+Sans" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/codigos.js" ></script>
	<title>LastXanadu</title>
</head>
<body>
	<?php require 'navbar-logged.php';?>

	<div class="container upload">
		<form class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3>Sube aqui tu Ilustración</h3>
						</div>
						<div class="panel-body">
							<div class="row">

								<!-- File Inputs and Preview -->
								<div class="col-md-6" >
									<div class="form-group">
										<div class="col-md-12">
											<label>Selecciona la Ilustración que deseas subir</label>
											<div class="new-input">
												<input id="cover" type="file" name="file" required="required" onchange="previewFile()">
											</div>
										</div>
									</div>
									<div class="row section">
										<div class="col-lg-12">
											<img id="preview" class="img-responsive" src="img/preview.png" alt="Tu Ilustración"/>
										</div>
									</div>
								</div>

								<!-- Title, Tags and Description -->
								<div class="col-md-6" id="left-side">
									<div class="form-group">
										<div class="col-md-12">
											<input class="form-control" type="text" name="title" required="required" placeholder="Titulo de la Ilustracion">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input class="form-control" type="text" name="title" required="required" placeholder="Etiquetas (Separadas por comas)">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<textarea class="form-control" id="descBox" name="description" required="required" placeholder="Cuentanos algo sobre tu Ilustración"></textarea>
										</div>
									</div>
								</div>
							</div>

							<!-- Submit Button -->
							<div class="row section">
								<div class="col-lg-12">
									<div >
										<input id="submitButton" class="btn btn-warning" type="submit" name="submit" value="Subir Ilustración">
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