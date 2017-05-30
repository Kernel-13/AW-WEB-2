<?php
$query = "SELECT * FROM posts WHERE post_type='Picture' ORDER BY RAND() LIMIT 3";
$result = $mysqli->query($query) or die($mysqli->error."en la línea".(_LINE_-1));	

$num_items = $result->num_rows;		

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">



	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php 
		$count = 0;
		while ($count < $num_items) {
			if ($count == 0) {
				echo '<li data-target="#myCarousel" data-slide-to="'.$count.'" class="active"></li>';
			} else {
				echo '<li data-target="#myCarousel" data-slide-to="'.$count.'"></li>';
			}
			$count += 1;
		}
		?>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">

		<?php 
		$count = 0;
		while ($item = $result->fetch_assoc()) {
			if ($count == 0) {
				echo '
				<div class="item active">
					<img class="audio-img-carusel" src="'.$item["post_illust"].'" alt="'.$item["post_title"].'">
					<div class="carousel-caption carousel-xanadu">
						<a href="illust.php?id='.$item["post_id"].'"><h1><span>'.$item["post_title"].'</span></h1></a>
					</div>
				</div>
				';
			} else {
				echo '
				<div class="item">
					<img class="audio-img-carusel" src="'.$item["post_illust"].'" alt="'.$item["post_title"].'">
					<div class="carousel-caption carousel-xanadu">
						<a href="illust.php?id='.$item["post_id"].'"><h1><span>'.$item["post_title"].'</span></h1></a>
					</div>
				</div>
				';
			}
			$count += 1;
		}
		?>
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