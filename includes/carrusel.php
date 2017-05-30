<?php
$postsCarusel = "SELECT * FROM posts WHERE post_type='Picture' ORDER BY RAND() LIMIT 3";
$resultadoCarusel = $mysqli->query($posts) or die($mysqli->error."en la línea".(_LINE_-1));	

if($resultadoCarusel->num_rows > 5){
	$num_entradas = 5;
}
else{
	$num_entradas = $resultadoCarusel->num_rows;	
}

echo $num_entradas;
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="la.jpg" alt="Los Angeles">
		</div>

		<div class="item">
			<img src="chicago.jpg" alt="Chicago">
		</div>

		<div class="item">
			<img src="ny.jpg" alt="New York">
		</div>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>