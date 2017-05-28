<?php
	echo "
		<div class='box-tabla'>
			<table class='botones-tabla'>
				<tbody>
					<tr>
						<td>
							<ul class='pager'>
								<!--<li class='previous'><a href='novedades.html'>Previous</a></li>-->
							</ul>
						</td>
						<td id='botones-numericos'>
							<ul class='pagination pagination-sm pager'>
	";

							$cont = 0;
				 			while($cont<$totalPaginas && $cont<$paginasMax){
				 				$cont++;
									if($cont==$paginaActual){
										echo "<li class='active'><a href='novedades.php?paginaActual=$cont'>$cont</a></li>
									";}
									else{
										echo "<li><a href='novedades.php?paginaActual=$cont'>$cont</a></li>";
									}
								}

							echo "
							</ul>
						</td>
						<td>
							<ul class='pager'>
								<li id='boton-next-prev' class='next'><a href='novedadesP2.html'>Next</a></li>
							</ul>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
								";
?>