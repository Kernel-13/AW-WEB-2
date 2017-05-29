<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>

<meta charset = "utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/ranking.css">
    <link rel="icon" href="img/hecate.ico" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>LastXanadu</title>

</head>
<body>
    <?php require "includes/navbar.php"; 
		require ("includes/db.php"); 
	?>    
    <!--Desde aquí empezamos-->  
    <div class="container">   
        <!--contenido -->
        <div class="col-sm-12">
       <!--Cabecera-->
        <div id="cabecera" class="row"> 
                <h3>Nuestros músicos</h3>
        </div>
        <hr>
		  <?php 
            $consulta = "SELECT * FROM users, posts where users.user_id=posts.post_owner and posts.post_type='Song' order by posts.post_favourites DESC limit 10";
            $resultado = $mysqli->query($consulta) or die ($mysqli->error."en la linea".(__LINE__-1));
            $cont = 1;
            while ($row = mysqli_fetch_row($resultado)){                                          
            	echo '<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">			
					<img class="img-responsive" src="'.$row[15].'" alt="">
				</div>
				<br/>
  				<div class="col-xs-8 col-sm-8 col-md-4 col-lg-8">                           
                     <h5 class = "titulo" ><a href="user.php?user='.$row[0].'">'.$row[1].'</a></h5>
                     <h4>'.$row[12].'</h4>


                </div>

			</div>
            <br>';
            	
            	
            	echo '<br>';
            	
            	echo '<hr class="lineapunteada">';            	
                    	
            	$cont++;
            }
            
            $mysqli->close();
            ?>

        
                  
 <br>

					<ul class="pagination pagination-sm" align="center">
						<li><a href="nuestrosMusicos.html">A</a></li>
						<li><a href="nuestrosMusicos.html">B</a></li>
						<li><a href="nuestrosMusicos.html">C</a></li>
						<li><a href="nuestrosMusicos.html">D</a></li>
						<li><a href="nuestrosMusicos.html">E</a></li>
						<li><a href="nuestrosMusicos.html">F</a></li>
						<li><a href="nuestrosMusicos.html">G</a></li>
						<li><a href="nuestrosMusicos.html">H</a></li>
						<li><a href="nuestrosMusicos.html">I</a></li>
						<li><a href="nuestrosMusicos.html">J</a></li>
						<li><a href="nuestrosMusicos.html">K</a></li>
						<li><a href="nuestrosMusicos.html">L</a></li>
						<li><a href="nuestrosMusicos.html">M</a></li>
						<li><a href="nuestrosMusicos.html">N</a></li>
						<li><a href="nuestrosMusicos.html">O</a></li>
						<li><a href="nuestrosMusicos.html">P</a></li>
						<li><a href="nuestrosMusicos.html">Q</a></li>
						<li><a href="nuestrosMusicos.html">R</a></li>
						<li><a href="nuestrosMusicos.html">S</a></li>
						<li><a href="nuestrosMusicos.html">T</a></li>
						<li><a href="nuestrosMusicos.html">U</a></li>
						<li><a href="nuestrosMusicos.html">V</a></li>
						<li><a href="nuestrosMusicos.html">X</a></li>
						<li><a href="nuestrosMusicos.html">Y</a></li>
						<li><a href="nuestrosMusicos.html">Z</a></li>
						<li><a href="nuestrosMusicos.html">0..9</a></li></ul>

        <!-- pié -->
        <footer>
		<ul class="list-inline">
			<li><a href="quienesSomos.html">¿Quienes somos?</a></li>
			<li><a href="contacto.html">Contacta con nosotros</a></li>
			<li><a href="dondeEncontrarnos.html">Donde encontrarnos</a></li>
			<li><a href="autoresWeb.html">Autores web</a></li>
			<li><a href="actualizaciones.html">Actualizaciones y novedades de la pagina</a></li>
		</ul>
	</footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
</body>
</html>