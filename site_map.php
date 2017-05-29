<?php
session_start();
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

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Mapa del Sitio</h2>
				<ul>
					<li> 
						<p><a href="login.php">Iniciar Sesión</a> / Formulario de Inicio de Sesion</p>
					</li>
					<li>						
						<p><a href="register.php.php">Registro</a> / Formulario de Registro - 1er Paso </p>
					</li>
					<li> 						
						<p><a href="register_second.php">Registro - 2da Fase</a> / Formulario de Registro - 2do Paso </p>
					</li>
					<li> 						
						<p><a href="user.php">Usuario</a> / Un perfil de usuario (Distinta barra de navegación)</p>
					</li>
					<li> 						
						<p><a href="my_posts.php">Mis Aportaciones</a> / Aportaciones de un usuario (Distinta barra de navegación)</p>
					</li>
					<li> 						
						<p><a href="my_messages.php">Mis Mensajes</a> / Bandeja de Mensaje de un usuario (Distinta barra de navegación)</p>
					</li>
					<li> 						
						<p><a href="timeline.php">My Timeline</a> / Ultimas aportaciones de los usuarios que sigues (Distinta barra de navegación)</p>
					</li>
					<li> 						
						<p><a href="upload_illust.php">Subir Ilustración</a> / Formulario para subir una ilustración (Distinta barra de navegación)</p>
					</li>
					<li> 						
						<p><a href="upload_song.php">Subir Canción</a> / Formulario para subir una canción (Distinta barra de navegación)</p>
					</li>
					<li> 						
						<p><a href="edit_illust.php">Editar Ilustración</a> / Formulario para editar datos de una ilustración (Distinta barra de navegación)</p>
					</li>
					<li> 						
						<p><a href="edit_song.php">Editar Canción</a> / Formulario para editar datos de una canción (Distinta barra de navegación)</p>
					</li>
					<li> 						
						<p><a href="song.php">Vista de Canción</a> / Como se ve una canción</p>
					</li>
					<li> 						
						<p><a href="illust.php">Vista de Ilustración</a> / Como se ve una ilustración </p>
					</li>
					<li> 						
						<p><a href="flagged_content.php">Tabla de Contenido Marcado como Ofensivo</a> / Vista de un Administrador - Moderador</p>
					</li>
					<li> 						
						<p><a href="index.php">Inicio</a> / Como se ve la portada</p>
					</li>
					<li> 						
						<p><a href="novedades.php">Novedades</a> / Vista del contenido mas reciente (lo ultimo añadido)</p>
					</li>
				</ul>
			</div>
		</div>

		
	</div>

</body>
</html>