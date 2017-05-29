<?php 

$localhost = "mysql.hostinger.es";
$username = "u970602151_lx";
$password = "yamaxanadu";
$db = "u970602151_lx";

$mysqli = new mysqli( $localhost, $username, $password,	$db);
if ( mysqli_connect_errno() ) {
	echo "Error de conexión a la BD: ".mysqli_connect_error();
	exit();
}

?>