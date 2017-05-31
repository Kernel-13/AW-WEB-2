<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
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
		<div class="row"> 
             <div class="col-lg-12">
                <h3 id="titulo">Las mejores pinturas de la semana </h3>
                	<h4 id="rojo">&#33;Tenemos las &uacute;ltimas obras de arte, no te los pierdas!</h4>                                       
            </div>
        </div>
         <hr/>                      
            <?php 
            $consulta = "SELECT * FROM users, posts where users.user_id=posts.post_owner and posts.post_type='Picture' order by posts.post_favourites DESC limit 10";
            $resultado = $mysqli->query($consulta) or die ($mysqli->error."en la linea".(__LINE__-1));
            $cont = 1;
            while ($row = $resultado->fetch_assoc()){                                          
            	echo '<div class="row">
						<p class="centrar titulobonito">'.$row["post_title"].'</p>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<img class="ilust" src="'.$row["post_illust"].'" alt="imagen de musica">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
		                <div class="centrar">
		                    <div class="top">'.$cont.'</div>
							<h4><a href="user.php?id='.$row["user_id"].'">'.$row["user_name"].'</a></h4>
							    <a class="btn btn-primary" href="illust.php?id='.$row["post_id"].'">Más información<span class="glyphicon glyphicon-chevron-right"></span></a>
								<h5>'.$row["post_views"].' Reproducciones</h5>
		                        <h5>'.$row["post_favourites"].' Puntos</h5>
		                    </div>
						</div>
					 </div>';
            	
            	echo '<hr>';
            	
            	$cont++;
            }
            
            $mysqli->close();
            ?>
                </div>

                <!--Acontecimientos-->
                <div id="cabecera" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                     <div>
                       <h3 id="acont">Pr&oacute;ximos eventos...</h3>
                        <h4 class="headercomentario">Madrid</h4>
                        <p>Julian castillo ha publicado este mes de Abril un nuevo cover.</p>                        
                        <img class="ilustbarralateral" alt="madrid" src="img/madrid.jpg" height="200" width="350">
                       
                        <h4 class="headercomentario">Barcelona</h4>
                        <p>En el palacio de San Jordi van ha reunirse fans de Laura Sanz para no te lo puedes perder.</p>
                        <img class="ilustbarralateral" alt="barcelona" src="img/barcelona.jpg" height="200" width="350">

                        <h4 class="headercomentario">Valencia</h4>
                        <p>Nuevo disco de Santiago Lorenzo un nuevo tema que te gustar&aacute;, pasat&eacute; a escucharlo.</p>
                        <img class="ilustbarralateral" alt="valencia" src="img/valencia.jpg" height="200" width="350">  

                        <h4 class="headercomentario">Bilbao</h4>                
                        <img class="ilustbarralateral" alt="bilbao" src="img/bilbao.jpg" height="200" width="350">
                        <p>Nuevo disco de Santiago Lorenzo un nuevo tema que te gustar&aacute;, pasat&eacute; a escucharlo</p>

                        <h4 class="headercomentario">Málaga</h4>                
                        <img class="ilustbarralateral" alt="malaga" src="img/malaga.jpg" height="200" width="350">
                        <p>Nuevo disco de Santiago Lorenzo un nuevo tema que te gustar&aacute;, pasat&eacute; a escucharlo</p>

                        <h4 class="headercomentario">Vigo</h4>                
                        <img class="ilustbarralateral" alt="vigo" src="img/vigo.jpg" height="200" width="350">
                        <p>Nuevo disco de Santiago Lorenzo un nuevo tema que te gustar&aacute;, pasat&eacute; a escucharlo</p>
                        <p>A que esperas a buscar dasdasdasdadsadasdasdasdasdasdasdasdad</p>
                        <p>Puedes seguirnos en nuestras redes sociales y compartirlo...</p>                

                    </div>
                </div> 
            </div>   

        <?php require "includes/PiePagina.php"; ?>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
