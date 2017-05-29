<?php
session_start();
require('includes/db.php');
?>

<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/post-style.css">
	<link rel="stylesheet" type="text/css" href="css/buttons.css">
	<title>Un/Follow</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>
	<?php require "includes/functions.php"; ?>

	<div class="container">

		<?php 


		if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
			$me = $_SESSION['user_id'];
			$user_to_follow = $_GET['id'];
			if ($me != $user_to_follow && (is_valid_user($mysqli, $me) && is_valid_user($mysqli, $user_to_follow))) {

				$yo = get_user_from_id($mysqli, $me);
				$him = get_user_from_id($mysqli, $user_to_follow);

				if (!is_following($mysqli, $_GET['id'], $_SESSION['user_id'])) {

					$my_following = $yo['user_following'].",".$user_to_follow;
					$his_followers = $him['user_followers'].",".$me;

					$q1 = "UPDATE users SET user_following='$my_following' WHERE user_id='$me'";
					$q2 = "UPDATE users SET user_followers='$his_followers' WHERE user_id='$user_to_follow'";

					if ($mysqli->query($q1) == TRUE) {
						echo "<p> FOLLOW 1 </p>";
					}

					if ($mysqli->query($q2) == TRUE) {
						echo "<p> FOLLOW 2 </p>";
					}

				} else {
					$count = 0;
					$my_following = $yo['user_following'];
					$aux1 = explode(",", $my_following);
					$string1 = "";
					foreach ($aux1 as $person) {
						if ($count == 0) {
							$string1 = $string1.$person;
						} else {
							if ($person != $user_to_follow) {
								$string1 = $string1.','.$person;
							}
						}
						$count += 1;
					}

					$count2 = 0;
					$his_followers = $him['user_followers'];
					$aux2 = explode(",", $his_followers);
					$string2 = "";
					foreach ($aux2 as $person2) {
						if ($count2 == 0) {
							$string2 = $string2.$person2;
						} else {
							if ($person2 != $me) {
								$string2 = $string2.','.$person2;
							} 
						}
						$count2 += 1;
					}

					$q3 = "UPDATE users SET user_following='$string1' WHERE user_id='$me'";
					$q4 = "UPDATE users SET user_followers='$string2' WHERE user_id='$user_to_follow'";

					if ($mysqli->query($q3) == TRUE) {
						echo "<p> UNFOLLOW 1 </p>";
					}

					if ($mysqli->query($q4) == TRUE) {
						echo "<p> UNFOLLOW 2 </p>";
					}

				}

				header("Location: user.php?id=".$user_to_follow."");
			} else {
				header("Location: user.php?id=".$user_to_follow."");
			}
		} elseif(!isset($_GET['id']) && isset($_SESSION['user_id'])) {
			echo '
			<div class="container-fluid">
				<div class="row section something-bad">
					<p> Hubo un problema a la hora de publicar tu comentario </p>
				</div>
			</div>
			';
		} elseif(isset($_GET['id']) && !isset($_SESSION['user_id'])) {
			echo '
			<div class="container-fluid">
				<div class="row section something-bad">
					<p> Debes haber Iniciado Sesión para poder seguir a alguien </p>
				</div>
			</div>
			';
		}
		
		?>
	</div>
	<?php 
	mysqli_close($mysqli);
	?>

</body>
</html>