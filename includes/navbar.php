<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			</button>
			<a class="navbar-brand" href="index.php">Last<span>Xanadu</span></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="novedades.php">Novedades</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Nuestros Usuarios <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="nuestrosMusicos.php">Músicos</a></li>
						<li><a href="nuestrosIlustradores.php">Ilustradores</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Popular <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="popular-musica.php">Musica Popular </a></li>
						<li><a href="popular-ilustraciones.php">Ilustraciones Populares</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Ranking <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="rankingM.php">Música</a></li>
						<li><a href="rankingI.php">Ilustraciones</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php 

				if (!isset($_SESSION['username'])) {
					echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Registrate</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</a></li>';
				} else {
					if ($_SESSION['user_type'] == 'Admin') {
						echo '
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Bienvenid@, '.$_SESSION['username'].' <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="user.php?id='.$_SESSION['user_id'].'">Mi Perfil</a></li>
								<li><a href="flagged_content.php">Contenido Ofensivo</a></li>
								<li><a href="messages.php">Mis Mensajes</a></li>
								<li><a href="timeline.php">My Timeline</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>';
					} else  {
						echo '
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Bienvenid@, '.$_SESSION['username'].' <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="user.php?id='.$_SESSION['user_id'].'">Mi Perfil</a></li>
								<li><a href="my_posts.php">Mis Aportaciones</a></li>
								<li><a href="messages.php">Mis Mensajes</a></li>
								<li><a href="timeline.php">My Timeline</a></li>';
								if ($_SESSION['user_type'] == 'Composer') {
									echo '<li><a href="upload_song.php">Subir Canción</a></li>';
								} else {
									echo '<li><a href="upload_illust.php">Subir Ilustración</a></li>';
								}
								echo '<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>';
					}
				}
				?>
			</ul>
			<form class="navbar-form" method="get" action="search.php">
				<div class="input-group">
					<label class="sr-only" for="search">Busqueda </label>
					<input type="text" class="form-control" placeholder="Busqueda" name="texto" id="search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</nav>