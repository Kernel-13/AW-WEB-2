<?php 

function comando($mysqli, $query){
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	return $resultado;
}

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

function get_sent_messages($mysqli, $sender, $table){

	$query = "SELECT * FROM $table WHERE message_sender='$sender' ORDER BY message_date DESC";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	$rows = mysqli_num_rows($resultado);
	if($rows > 0){
		while ($mensaje = $resultado->fetch_assoc()) {
			echo '
			<div class="row section">
				<div class="col-md-12 message">
					<div class="media">
						<div class="media-body media-right">';
							if ($table == "mensajes_privados") {
								$receptor = get_username_from_id($mysqli, $mensaje["message_receiver"]);
								echo '<h4 class="media-heading"> Para: '.$receptor.'</h4>';
								echo '<h5 class="media-heading"> Asunto: '.$mensaje["message_issue"].'</h5>';
							} elseif ($table == "mensajes_grupales") {
								echo '<h4 class="media-heading"> Grupo: '.$mensaje["message_group"].'</h4>';
								echo '<h5 class="media-heading"> Asunto: '.$mensaje["message_issue"].'</h5>';
							} else {
								echo '<h4 class="media-heading"> Asunto: '.$mensaje["message_issue"].'</h4>';
							}
							echo '
							<h5 class="media-heading"> Fecha del Mensaje: '.$mensaje["message_date"].'</h5><br>
							<p>'.$mensaje["message_body"].'</p>
						</div>
					</div>
				</div>
			</div>
			';
		}
	} else {
		echo '
		<div class="row section" style="text-align:center;">
			<h2> No has enviado ningún mensaje</h2>
		</div>
		';
	}
}

function obtain_user_list($mysqli){
	$query = "SELECT * FROM usuarios";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	return $resultado;
}

function get_messages($mysqli, $usuario){
	$user = str_replace(" ", "%", $usuario);
	$query = "SELECT * FROM messages WHERE message_receiver='$usuario' ORDER BY message_date DESC";
	$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
	// return $resultado;
	$rows = mysqli_num_rows($resultado);
	if($rows > 0){
		while ($registro = $resultado->fetch_assoc()) {
			$sender = get_username_from_id($mysqli, $registro["message_sender"]);
			echo '
			<div class="row section">
				<div class="col-md-12 message">
					<div class="media">
						<div class="media-body media-right">
							<h4 class="media-heading"> De: '.$sender.'</h4>
							<h5 class="media-heading"> Asunto: '.$registro["message_issue"].'</h5>
							<h5 class="media-heading"> Fecha del Mensaje: '.$registro["message_date"].'</h5><br>
							<p>'.$registro["message_body"].'</p>
						</div>
					</div>
				</div>
			</div>
			';
		}
	} else {
		echo '
		<div class="row section" style="text-align:center;">
			<h2> No tienes ningún mensaje nuevo</h2>
		</div>
		';
	}
}

?>