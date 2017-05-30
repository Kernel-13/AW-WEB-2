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
			$post = $_GET['id'];

			$cons = "SELECT * FROM posts WHERE post_id='$post'";
			$kk = $mysqli->query($cons);
			$id = $kk->fetch_assoc();

			if (mysqli_num_rows($kk) == 1) {

				$yo = get_user_from_id($mysqli, $me);

				if (!is_favourite($mysqli, $me, $post)) {

					$my_favs = $yo['user_favourites'].",".$post;
					$q = "UPDATE users SET user_favourites='$my_favs' WHERE user_id='$me'";

					if ($mysqli->query($q) == TRUE) {
						echo "<p> ALL GOOD </p>";
					}

				} else {
					$count = 0;
					$my_favs = $yo['user_favourites'];
					$aux = explode(",", $my_favs);
					$string = "";
					foreach ($aux as $fav) {
						if ($count == 0) {
							$string = $string.$fav;
						} else {
							if ($fav != $post) {
								$string = $string.','.$fav;
							}
						}
						$count += 1;
					}

					$q2 = "UPDATE users SET user_favourites='$string' WHERE user_id='$me'";

					if ($mysqli->query($q2) == TRUE) {
						echo "<p> MINUS ONE</p>";
					}

				}
				if ($id['post_type'] == 'Song') {
					header("Location: song.php?id=".$post."");
				} else {
					header("Location: illust.php?id=".$post."");
				}
			} else {
				if ($id['post_type'] == 'Song') {
					header("Location: song.php?id=".$post."");
				} else {
					header("Location: illust.php?id=".$post."");
				}
			}
		} elseif (!isset($_GET['id']) && isset($_SESSION['user_id'])) {
			echo '
			<div class="container-fluid">
				<div class="row section something-bad">
					<p> No existe ningun post con ese ID </p>
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