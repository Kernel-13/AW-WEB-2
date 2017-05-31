<?php
	echo "
		<div class='box-tabla'>
			<table class='botones-tabla'>
				<tbody>
					<tr>
						<td>";
						if($paginaActual>1){
						$paginaDestino = $paginaActual -1;
						echo "
							<ul class='pager'>
								<li class='previous'><a href='novedades.php?paginaActual=$paginaDestino'>Previous</a></li>
							</ul>";}

						echo"	
						</td>
						<td id='botones-numericos'>
							<ul class='pagination pagination-sm pager'>
	";

							$cont = 0;
				 			while($cont<$totalPaginas && $cont<$paginasMax){
				 				$cont=$cont+1;
									if($cont==$paginaActual){
										echo "Pagina actual: $paginaActual $cont
										<li class='active'><a href='novedades.php?paginaActual=$cont'>$cont</a></li>
									";}
									else{
										echo "<li><a href='novedades.php?paginaActual=$cont'>$cont</a></li>";
									}
								}

							echo "
							</ul>
						</td>
						<td>";
						if($paginaActual!=ceil($totalPagAux)){
							$paginaDestino = $paginaActual +1;
								echo"
								<ul class='pager'>
									<li id='boton-next-prev' class='next'><a href='novedades.php?paginaActual=$paginaDestino'>Next</a></li>
								</ul>";}

							echo"
						</td>
					</tr>
				</tbody>
			</table>
		</div>
								";
?>