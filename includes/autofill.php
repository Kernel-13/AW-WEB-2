<?php 

$localhost = "localhost";
$username = "lxfix";
$password = "lxfix";
$db = "lxfix";

if (isset($_GET['term'])){
    $return_arr = array();

    $auto = $_GET['term'];
    $conn = new mysqli( $localhost, $username, $password, $db);
    if ( mysqli_connect_errno() ) {
        echo "Error de conexión a la BD: ".mysqli_connect_error();
        exit();
    }

    $queryAJAX = "SELECT * FROM users WHERE user_name LIKE '%$auto%'";
    $data = $conn->query($queryAJAX) or die ($conn->error. " en la línea ".(__LINE__-1));
    while ($person = $data->fetch_assoc()) {
        $return_arr[] =  $person['user_name'];
    }

    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
?>