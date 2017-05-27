<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="es">

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
    <!--AQUI-->  
    <div class="container">
		<div class="col-sm-8">        
		<div id="cabecera" class="row"> 
            <div class="col-lg-12">
                <h3>Lista de éxitos de la semana
                        <small id="subt">¡Lo último!</small>                        
                </h3>
            </div>
        </div>
        <hr>                     
            <?php 
            $consulta = "SELECT * FROM users, posts where users.user_id=posts.post_owner and posts.post_type='Song' order by posts.post_favourites DESC limit 10";
            $resultado = $mysqli->query($consulta) or die ($mysqli->error."en la linea".(__LINE__-1));
            $cont = 1;
            while ($row = mysqli_fetch_row($resultado)){                                          
            	echo '<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="top">'.$cont.'</div>
					<img class="img-responsive" src="'.$row[15].'" alt="">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<h4 class="centar">'.$row[11].'</h4>
				
					 <h5 class="media-heading"><a href="user.php?user='.$row[0].'">'.$row[1].'</a></h5>
					 <a class="btn btn-primary" href="song.php">Más información<span class="glyphicon glyphicon-chevron-right"></span></a>
						<h5>'.$row[16].' Reproducciones</h5>
				</div>
			</div>
            <br>';
            	
            	echo '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:90%">
            	<span class="sr-only">9/10</span>
            	puntuacion: '.$row[17].'/10
            	</div>';
            	
            	echo '<br>';
            	
            	echo '<hr>';            	
                    	
            	$cont++;
            }
            
            $mysqli->close();
            ?>
                </div>

                <!--Acontecimientos-->
                <div id="cabecera" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div>
                        <h3>Acontecimientos...</h3>

                        <h4 class="headercomentario">Madrid</h4>
                        <p>Julian castillo ha publicado este mes de Abril un nuevo cover.</p>
                        <p>Sandra Romero ha anunciado que dejar&aacute de momento de publicar sus canciones...por temas personales.Estat&eacute; a la espera para poder saber m&aacutes de los acontecimientos.</p>
                        <p>Puedes acudir a la firma de discos de Jennifer Sweet en la Caja M&aacutegica de Madrid est&aacutes invitado este mes de abril el d&iacutea 25. Te esperamos...</p>
                        <h4 class="headercomentario">Barcelona</h4>
                        <p>En el palacio de San Jordi van ha reunirse fans de Laura Sanz para no te lo puedes perder.</p>

                        <h4 class="headercomentario">Valencia</h4>
                        <p>Nuevo disco de Santiago Lop&eacutez un nuevo tema que te gustar&aacute, pasat&eacute a escucharlo.</p>

                        <h4 class="headercomentario">Bilbao</h4>
                        <p>Alejandro Sanz ha estado acompa &ntildeando a Pablo Albatez promocionando su nuevo disco.
                        </p>

                        <h4 class="headercomentario">Palencia</h4>
                        <p>Ha incrementado en buena medidad los cantautores en est&aacute ciudad ya tiene m&aacutes de 100 reproducciones diarias.</p>

                        <h4 class="headercomentario">Galicia</h4>
                        <p>Lleg&aacute el verano y con ello los nuevo covers de la banda de canautores solecitos.Tambi&eacuten puedes seguirnos v&iacutea twiterr, facebook o otras redes sociales.</p>
                        <p>Te invitamo a participar en un sorteo para que puedas conocer a estos grandes artistas del momento s&oacutelo tienes que escuchar un min&iacutemo de 3 canciones en nuestro portal web.</p>

                        

                    </div>
                </div> 
            </div>     

                          
        
        <table class="botones-tabla">
            <tbody>
                <tr>
                    <td>
                        <ul class="pager">
                            <!--<li class="previous"><a href="novedades.html">Previous</a></li>-->
                        </ul>
                    </td>
                    <td id="botones-numericos">
                        <ul class="pagination pagination-sm pager">
                            <li class="active"><a href="novedades.html">1</a></li>
                            <li><a href="novedadesP2.html">2</a></li>
                            <li><a href="novedadesP3.html">3</a></li>
                            <li><a href="novedadesP4.html">4</a></li>
                            <li><a href="novedadesP5.html">5</a></li>
                            <li><a href="novedadesP6.html">...</a></li>
                            <li><a href="novedadesP9.html">9</a></li>
                            <li><a href="novedadesP10.html">10</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul class="pager">
                            <li id="boton-next-prev" class="next"><a href="novedadesP2.html">Next</a></li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>

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
