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
	<title>Registro - 1er Paso</title>
</head>
<body>
	<?php require 'navbar.php';?>

	<div class="container-fluid register">
		<div class="row form-class">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						Registro
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="register_second.php">
							<div class="form-group">
								<div class="col-sm-9">
									<input type="email" class="form-control" id="email" placeholder="Email" required="required" onchange="validar(this.value)">
								</div>
								<div class="col-sm-3 message-box">
									<span id="er_icon" class="icon_hidden"><img class="signal" src="img/no.png"> Invalido </span>
									<span id="ok_icon" class="icon_hidden"><img class="signal" src="img/ok.png"> Correcto </span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12"> 
									<input type="text" class="form-control" required="required" id="name" placeholder="Nombre">
								</div>
							</div>							
							<div class="form-group">
								<div class="col-sm-12"> 
									<input type="text" class="form-control" required="required" id="user" placeholder="Usuario">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12"> 
									<input type="password" class="form-control" required="required" id="pass" placeholder="Indique su contraseña">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12"> 
									<input type="password" class="form-control" required="required" id="pass2" placeholder="Repita su contraseña">
								</div>
							</div>
							<div>
								<div class="g-recaptcha" data-sitekey="6LcofhsUAAAAAOJ-p5clDHz38mzOHn4Ixicg5aeh"></div>
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

	<!--
	<a href="https://icons8.com/web-app/13114/Cancel">Cancel icon credits</a>
	<a href="https://icons8.com/web-app/13115/Ok">Ok icon credits</a>
-->

<script type="text/javascript">
	function validar(val){
		var text = val;
		var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
		var result = pattern.test(text);

		if (result) {
			$('#ok_icon').attr('class', 'icon_shown_ok');
			$('#er_icon').attr('class', 'icon_hidden');
			$('#email').css('box-shadow', '0 0 10px green');
		} else {
			$('#ok_icon').attr('class', 'icon_hidden');
			$('#er_icon').attr('class', 'icon_shown_err');
			$('#email').css('box-shadow', '0 0 10px red');
		}
	}
</script>
</body>
</html>