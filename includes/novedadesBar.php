<?php
	echo"
		<nav class='navbar navbar-inverse'>
			<ul class='nav navbar-nav'>";
				if($boolMusica == 1 && $boolImagen == 1){
					echo "<li class='active'><a href='novedades.php?boolImagen=1&boolMusica=1'>Todo</a></li>";
				}
				else{
					echo "<li><a href='novedades.php?boolImagen=1&boolMusica=1'>Todo</a></li>";
				}
				if($boolMusica == 1 && $boolImagen == 0){
					echo "<li class='active'><a href='novedades.php?boolImagen=0&boolMusica=1'>Solo musica</a></li>";
				}
				else{
					echo "<li><a href='novedades.php?boolImagen=0&boolMusica=1'>Solo musica</a></li>";
				}
				if($boolMusica == 0 && $boolImagen == 1){
					echo "<li class='active'><a href='novedades.php?boolMusica=0&boolImagen=1'>Solo ilustraciones</a></li>";
				}
				else{
					echo "<li><a href='novedades.php?boolMusica=0&boolImagen=1'>Solo ilustraciones</a></li>";
				}
				echo"
			</ul>
		</nav>
	";
?>