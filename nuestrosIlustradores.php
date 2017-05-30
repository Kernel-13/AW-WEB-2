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

    <div class="container">   

        <div id="cabecera" class="row"> 
            <div class="col-sm-12">
                <br>
                <h3>Nuestros Ilustradores</h3><br>
                <hr>
            </div>
            <br>

            <?php 
            $consulta = "SELECT * FROM users WHERE user_type='Illustrator' order by user_name ASC";
            $resultado = $mysqli->query($consulta) or die ($mysqli->error."en la linea".(__LINE__-1));

            while ($row = $resultado->fetch_assoc()){                                          
                echo '
                <div class="row just-user-list">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">           
                        <a href="user.php?id='.$row["user_id"].'"><img class="img-responsive img-rounded" src="'.$row["user_avatar"].'" alt="'.$row["user_name"].'"></a>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">                           
                        <h4 class = "titulo" ><a href="user.php?id='.$row["user_id"].'">'.$row["user_name"].'</a></h4>
                        <p>'.$row["user_description"].'</p>

                    </div>
                </div>
                <br/>
                <hr class="lineapunteada">
                ';   

            }

            $mysqli->close();
            ?>
        </div>
        
        <br>

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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>