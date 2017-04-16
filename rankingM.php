<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--paso1(lo estamos cogiendo de un sitio web)-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
    <link rel="stylesheet" type="text/css" href="css/ranking.css">
	<link rel="icon" href="img/hecate.ico" type="image/x-icon" />
      
   
<!--	<link rel="stylesheet" href="css/bootstrap.min.css"> -->
<!--
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	duda??? para que son estos
-->
	<title>LastXanadu</title>
</head>
<body>
	<?php require 'navbar.php';?>     
    <!--Desde aquí empezamos-->  
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lista de éxitos de la semana
                    <small>¡Lo último!</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <img class="img-responsive" src="img/grupo1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-9">
                <h3>1</h3>
                <p>Julian Castillo</p>
                <h4>Sombrero</h4>
                <p>545.343 Visualizaciones</p>
                <a class="btn btn-primary" href="#">Más información<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Two -->
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <img class="img-responsive" src="img/gurpo2.jpg">
                </a>
            </div>
            <div class="col-md-9">
                <h3>2</h3>
                <p>Pepe Pérez</p>
                <h4>Anochecer</h4>
                <p>456.123 Visualizaciones</p>
                <a class="btn btn-primary" href="#">Más información <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Three -->
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <img class="img-responsive" src="img/grupo3.jpg">
                </a>
            </div>
            <div class="col-md-9">
                <h3>3</h3>
                <p>Luis Sanz</p>
                <h4>Fiestón</h4>
                <p>352.113 Visualizaciones</p>
                <a class="btn btn-primary" href="#">Más información <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>        

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li>
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Nuestra página 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
</body>
</html>