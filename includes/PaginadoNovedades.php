<?php
	echo "
		<div class='box-tabla'>
			<table class='botones-tabla'>
				<tbody>
					<tr>
						<td>";
						if($paginaActual>1){
							$paginaActual--;
						echo "
							<ul class='pager'>
								<li class='previous'><a href='novedades.php?paginaActual=$paginaActual'>Previous</a></li>
							</ul>";}

						echo"	
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
						<td>";
						if($paginaActual<$totalPaginas){
							$paginaActual++;
								echo"
								<ul class='pager'>
									<li id='boton-next-prev' class='next'><a href='novedades.php?paginaActual=$paginaActual'>Next</a></li>
								</ul>";}

							echo"
						</td>
					</tr>
				</tbody>
			</table>
		</div>
								";
?>