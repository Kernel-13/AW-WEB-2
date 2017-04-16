<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/body-style.css">
	<link rel="stylesheet" type="text/css" href="css/session-style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Muli|Open+Sans" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<title>Registro - 2do Paso</title>
</head>
<body>
	<?php require 'navbar.php';?>

	<div class="container-fluid register-second">
		<div class="row form-class">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						Casi hemos acabado...
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="user.php">
							<div class="form-group">
								<div>
									<h4>Deseas registrarte como...	</h4>
								</div>
								<div class="col-sm-12 kind-selection">
									<div>
										<input type="radio" name="kind" value="musician"> Músico
									</div>
									<div>
										<input type="radio" name="kind" value="illustrator"> Ilustrador
									</div>
									<div>
										<input type="radio" name="kind" value="both"> Ambos
									</div>
								</div>
							</div>
							<div class="form-group">
								<div>
									<h4> Escoge una foto para tu perfil	</h4>
								</div>
								<div class="col-sm-12"> 
									<input type="file" class="form-control" required="required" id="avatar">
								</div>
							</div>							
							<div class="form-group">
								<div>
									<h4> Cuentanos algo sobre ti ... </h4>
								</div>
								<div class="col-sm-12"> 
									<textarea class="form-control" id="descBox" name="description" required="required" placeholder="... en menos de 1400 caracteres" maxlength="1400"></textarea>
								</div>
							</div>
							<div class="form-group"> 
								<div class="col-sm-12 submitButton">
									<button type="submit" class="btn btn-warning">Registrarse</button>
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>			
	</div>
</body>
</html>