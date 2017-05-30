<?php
	$postsCarusel = "SELECT * FROM posts WHERE `post_tags` = 'carusel'";
	$resultadoCarusel = $mysqli->query($posts) or die($mysqli->error."en la línea".(_LINE_-1));	

	if($resultadoCarusel->num_rows > 5){
		$num_entradas = 5;
	}
	else{
		$num_entradas = $resultadoCarusel->num_rows;	
	}
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
	<?php
	if($num_entradas>1){
		echo"<li data-target='#myCarousel' data-slide-to='0' class='active'></li>";
	}
	for($i=2; $i<$num_entradas; $i++){
		echo"<li data-target='#myCarousel' data-slide-to=$i></li>";
	}
	?>
	</ol>

	<!-- Wrapper for slides -->
	<div id="carusel" class="carousel-inner" role="listbox">
	<?php
	$articulosMostrados=1;
	while($articulosMostrados < $num_entradas && $registroCarusel = $resultadoCarusel->fetch_array(MYSQLI_BOTH)){
		if($articulosMostrados==1){
			if($registroCarusel["post_type"]== 'Song'){
			echo"
				<div class='item active'>
					<img class='audio-img-carusel' src=$registroCarusel[post_illust] alt='Chania'>
					<audio class='audio-player-carusel' controls='controls'> <source src=$registroCarusel[post_song] type='audio/mpeg'> </audio>
					<p>$registroCarusel[post_description]</p>
				</div>";
			}
			else{
				echo"
				<div class='item active'>
					<img class='ilust-carusel' src=$registroCarusel[post_illust] alt='Chania'>
					<p>$registroCarusel[post_description]</p>
				</div>";
			}
		}
		else{
			if($registroCarusel["post_type"]== 'Song'){
			echo"
			<div class='item'>
				<img class='audio-img-carusel' src=$registroCarusel[post_illust] alt='Chania'>
				<audio class='audio-player-carusel' controls='controls'> <source src=$registroCarusel[post_song] type='audio/mpeg'> </audio>
				<p>$registroCarusel[post_description]</p>
			</div>";
		}
		else{
			echo"
			<div class='item'>
				<img class='ilust-carusel' src=$registroCarusel[post_illust] alt='Chania'>
				<p>$registroCarusel[post_description]</p>
			</div>";
		}
		}
		$articulosMostrados++;
	}
	?>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>