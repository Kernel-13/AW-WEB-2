<?php 

function get_user_from_username($mysqli, $username){
	$query = "SELECT * FROM users WHERE user_name='$username'";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	$stuff = $resultado->fetch_assoc();
	return $stuff;
}

function get_user_from_id($mysqli, $id){
	$query = "SELECT * FROM users WHERE user_id='$id'";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	$stuff = $resultado->fetch_assoc();
	return $stuff;
}

function get_post($mysqli, $id){
	$query = "SELECT * FROM posts WHERE post_id='$id'";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	$stuff = $resultado->fetch_assoc();
	return $stuff;
}

function is_following($mysqli, $id, $me){
	$query = "SELECT * FROM users WHERE user_id='$me'";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	$yo = $resultado->fetch_assoc();

	if (!is_null($yo)) {
		$user_followers = $yo['user_following'];
		$people = explode(",", $user_followers);

		if (in_array($id, $people)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

function is_valid_user($mysqli, $id){
	$query = "SELECT * FROM users WHERE user_id='$id'";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));

	$rows = mysqli_num_rows($resultado);
	if ($rows == 1) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function obtain_user_list($mysqli){
	$query = "SELECT * FROM users";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	return $resultado;
}

function get_sent_messages($mysqli, $env){

	$query = "SELECT * FROM messages WHERE message_sender='$env' ORDER BY message_date DESC";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	$rows = mysqli_num_rows($resultado);
	if($rows > 0){
		while ($mensaje = $resultado->fetch_assoc()) {
			$sender = get_user_from_id($mysqli, $mensaje["message_sender"]);
			$receiver = get_user_from_id($mysqli, $mensaje["message_receiver"]);

			echo '
			<div class="row section">
				<div class="col-md-2">
					<div>
						<h4 class="media-heading"> 
							<img src="'.$sender["user_avatar"].'" alt="Emisor" class="img-rounded"> <span class="glyphicon glyphicon-arrow-right"></span> 
							<a href="user.php?id='.$receiver["user_id"].'"><img src="'.$receiver["user_avatar"].'" alt="Receptor" class="img-rounded"></a>
						</h4>
						<div>
							<h4>To '.$receiver["user_name"].'</h4>
						</div>
					</div>
				</div>
				<div class="col-md-10">
					<div class="media">
						<div class="media-body media-right">
							<p>'.nl2br($mensaje["message_body"]).'</p>
							<h5 class="media-heading"> Fecha del Mensaje: '.$mensaje["message_date"].'</h5>
						</div>
					</div>
				</div>
			</div>
			';
		}
	} else {
		echo '
		<div class="row section something-bad" style="text-align:center;">
			<h2> No has enviado ningún mensaje</h2>
		</div>
		';
	}
}

function get_messages($mysqli, $usuario){
	$user = str_replace(" ", "%", $usuario);
	$query = "SELECT * FROM messages WHERE message_receiver='$usuario' ORDER BY message_date DESC";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));

	$rows = mysqli_num_rows($resultado);
	if($rows > 0){
		while ($mensaje = $resultado->fetch_assoc()) {
			$sender = get_user_from_id($mysqli, $mensaje["message_sender"]);

			echo '
			<div class="row section">
				<div class="col-md-12 message">
					<div class="media">
						<div class="media-left">
							<a href="user.php?id='.$sender['user_id'].'"><img alt="Imagen de Amigo" src="'.$sender['user_avatar'].'" class="img-circle media-object"></a>
						</div>
						<div class="media-body media-right">
							<h4 class="media-heading">De '.$sender['user_name'].'</h4>
							<p>'.nl2br($mensaje["message_body"]).'</p>
							<h5 class="media-heading"> Fecha del Mensaje: '.$mensaje["message_date"].'</h5>
						</div>
					</div>
				</div>
			</div>
			';
		}
	} else {
		echo '
		<div class="row section something-bad" style="text-align:center;">
			<h2> No tienes ningún mensaje </h2>
		</div>
		';
	}
}

?>