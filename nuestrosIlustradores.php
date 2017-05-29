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
                <h3>Nuestras Ilustraciones</h3>
        </div>
        <hr>



 <?php 
            $consulta = "SELECT * FROM users, posts where users.user_id=posts.post_owner and posts.post_type='Picture' order by posts.post_favourites DESC limit 10";
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

<div class=”row”>
<div class=”col-lg-3 col-md-4 col-sm-6 col-xs-12″><ul class="pagination pagination-sm" align="center">
						<li><a href="nuestrosIlustradores.html">A</a></li>
						<li><a href="nuestrosIlustradores.html">B</a></li>
						<li><a href="nuestrosIlustradores.html">C</a></li>
						<li><a href="nuestrosIlustradores.html">D</a></li>
						<li><a href="nuestrosIlustradores.html">E</a></li>
						<li><a href="nuestrosIlustradores.html">F</a></li>
						<li><a href="nuestrosIlustradores.html">G</a></li>
						<li><a href="nuestrosIlustradores.html">H</a></li>
						<li><a href="nuestrosIlustradores.html">I</a></li>
						<li><a href="nuestrosIlustradores.html">J</a></li>
						<li><a href="nuestrosIlustradores.html">K</a></li>
						<li><a href="nuestrosIlustradores.html">L</a></li>
						<li><a href="nuestrosIlustradores.html">M</a></li>
						<li><a href="nuestrosIlustradores.html">N</a></li>
						<li><a href="nuestrosIlustradores.html">O</a></li>
						<li><a href="nuestrosIlustradores.html">P</a></li>
						<li><a href="nuestrosIlustradores.html">Q</a></li>
						<li><a href="nuestrosIlustradores.html">R</a></li>
						<li><a href="nuestrosIlustradores.html">S</a></li>
						<li><a href="nuestrosIlustradores.html">T</a></li>
						<li><a href="nuestrosIlustradores.html">U</a></li>
						<li><a href="nuestrosIlustradores.html">V</a></li>
						<li><a href="nuestrosIlustradores.html">X</a></li>
						<li><a href="nuestrosIlustradores.html">Y</a></li>
						<li><a href="nuestrosIlustradores.html">Z</a></li>
						<li><a href="nuestrosIlustradores.html">0..9</a></li>

            </div><br><hr>

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