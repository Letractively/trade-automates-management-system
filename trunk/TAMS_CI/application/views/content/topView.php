<!DOCTYPE article PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a href="#"  rel="bookmark">
					All trade automats
			</a>
		</h1>
	</header>
		<p>
			<table class="none"> 
			<tr> 
			<th> 		
				<table>
				 <thead>
				 <tr>
					 <th>Position</th>
					 <th>Type</th>
					 <th>Total sold</th>
					 <th>Owner Name</th>
				 </tr>
	 			</thead>
	 			<tbody>
					<?php   
					$count=0;
					foreach ($ta_top as $item)
					{ 
								$count ++;
								echo '<tr>';
								echo '<th>', $count, '</th>';
								echo '<th>', $item->Type, '</th>';
								echo '<th>', $item->SellAmount, '</th>';
								echo '<th>', $item->Owner, '</th>';
								echo '</tr>';
								
					}
						?>
				</tbody>
				</table>			
			</th> 
			<th> 
				<table>
					 <thead>
					 <tr>
						 <th>Position</th>
						 <th>Product Name</th>
						 <th>Quantity of items sold</th>
					 </tr>
		 			</thead>
		 			<tbody>
						<?php   
						$count=0;
						foreach ($products_top as $item)
						{ 
									$count ++;
									echo '<tr>';
									echo '<th>', $count, '</th>';
									echo '<th>', $item->items_sold, '</th>';
									echo '<th>', $item->Name, '</th>';
									echo '</tr>';
									
						}
							?>
					</tbody>
				</table>		
			</th>
			</tr>
		</table>

			
		</p>
			

</article>

