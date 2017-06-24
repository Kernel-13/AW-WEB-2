<?php 

$localhost = "localhost";
$username = "lxfix";
$password = "lxfix";
$db = "lxfix";

$mysqli = new mysqli( $localhost, $username, $password,	$db);
if ( mysqli_connect_errno() ) {
	echo "Error de conexión a la BD: ".mysqli_connect_error();
	exit();
}

?>