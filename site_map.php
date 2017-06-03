<?php
session_start();
require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require "includes/head.php"; ?>
	<link rel="stylesheet" type="text/css" href="css/post-style.css">
	<title>Mapa del Sitio</title>
</head>
<body>
	<?php require "includes/navbar.php"; ?>

	<div class="container map">
		<div class="row">
			<div class="col-md-12">
				<h2>Mapa del Sitio</h2>
				<ul>
					<li>
						<h3>Para Usuarios No Registrados</h3><br>
						<ul>
							<li> <p><a href="login.php">Iniciar Sesión</a> / Formulario de Inicio de Sesion</p>	</li>
							<li> <p><a href="register.php.php">Registro</a> / Formulario de Registro  </p></li>
							<li> <p><a href="index.php">Inicio</a> / Pagina Principal</p>	</li>
							<li> <p><a href="novedades.php">Novedades</a> / Vista del contenido mas reciente (lo ultimo añadido)</p> </li>

							<li> <p><a href="nuestrosMusicos.php">Nuestros Musicos</a> / Lista de Musicos del Sitio</p> </li>
							<li> <p><a href="nuestrosIlustradores.php">Nuestros Ilustradores</a> / Lista de Ilustradores del Sitio</p> </li>

							<li> <p><a href="popular-musica.php">Musica Popular</a> / Las Canciones más vistas </p>	</li>
							<li> <p><a href="popular-ilustraciones.php">Ilustraciones Populares</a> / Las Ilustraciones más vistas</p>	</li>

							<li> <p><a href="rankingM.php">Ranking de Canciones</a> / Las Canciones con más favoritos</p>	</li>
							<li> <p><a href="rankingI.php">Ranking de Ilustraciones</a> / Las Ilustraciones con más favoritos</p>	</li>

							<li> <p><a href="search.php">Busqueda</a> / Se debe introducir una palabra en la barra de busqueda antes de buscar</p>	</li>

							<?php 
							$query = "SELECT * FROM users ORDER BY RAND() LIMIT 1";
							$resultado = $mysqli->query($query);
							if ($resultado->num_rows == 1) {
								$user = $resultado->fetch_assoc();
								echo '<li> <p><a href="user.php?id='.$user['user_id'].'">Usuario</a> / Un perfil de usuario aleatorio</p></li>';
							} else {
								echo '<li> <p><a href="user.php">Usuario</a> / Un perfil de usuario</p></li>';
							}
							?>
							

						</ul>
					</li>			
				</ul>

				<ul>
					<li>
						<h3>Para Usuarios Registrados</h3><br>
						<ul>
							<li> <p><a href="my_posts.php">Mis Aportaciones</a> / Aportaciones del usuario</p></li>
							<li> <p><a href="messages.php">Mis Mensajes</a> / Bandeja de Mensaje del usuario</p></li>
							<li> <p><a href="timeline.php">My Timeline</a> / Ultimas aportaciones de los usuarios que sigues</p></li>
							<li> <p><a href="upload_illust.php">Subir Ilustración</a> / Formulario para subir una ilustración / Solo Ilustradores</p></li>
							<li> <p><a href="upload_song.php">Subir Canción</a> / Formulario para subir una canción / Solo Musicos</p></li>
							
							<?php 
							$q1 = "SELECT * FROM posts WHERE post_type='Picture' ORDER BY RAND() LIMIT 1";
							$resultado = $mysqli->query($q1);
							if ($resultado->num_rows == 1) {
								$illust = $resultado->fetch_assoc();
								echo '<li> <p><a href="illust.php?id='.$illust['post_id'].'">Vista de una Ilustración aleatoria</a> / Como se ve una ilustración </p></li>';
							} else {
								echo '<li> <p><a href="illust.php">Vista aade Ilustración</a> / Como se ve una ilustración </p></li>';
							}
							?>


							<?php 
							$q2 = "SELECT * FROM posts WHERE post_type='Song' ORDER BY RAND() LIMIT 1";
							$resultado = $mysqli->query($q2);
							if ($resultado->num_rows == 1) {
								$song = $resultado->fetch_assoc();
								echo '<li> <p><a href="song.php?id='.$song['post_id'].'">Vista de una Canción aleatoria</a> / Como se ve una canción</p></li>';
							} else {
								echo '<li> <p><a href="song.php">Vista de Canción</a> / Como se ve una canción</p></li>';
							}
							?>
							<li> <p><a href="flagged_content.php">Tabla de Contenido Marcado como Ofensivo</a> / Solo accesible por un Administrador </p></li>
							<li>
								<h4>Edición</h4>
								<ul>
									<li> <p><a href="edit_illust.php">Editar Ilustración</a> / Para Editar una Ilustración, el usuario debera dirigirse a 'Mis Aportaciones', y hacer clic en 'Editar Publicación' sobre la ilustración que desea editar </p></li>
									<li> <p><a href="edit_song.php">Editar Canción</a> / Para Editar una Canción, el usuario debera dirigirse a 'Mis Aportaciones', y hacer clic en 'Editar Publicación' sobre la Canción que desea editar </p></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

		
	</div>

</body>
</html>