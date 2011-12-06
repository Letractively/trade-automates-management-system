<!DOCTYPE article PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a href="#"  rel="bookmark">
					All trade lists
			</a>
		</h1>
	</header>
		<p>
			<div id = pagination>
				<?php echo $pagination?>
			</div>

			<table>

				 <thead>
				 <tr>
					 <th>ID</th>
					 <th>Product Name</th>
					 <th>Product Price</th>
					 <th>Quantity</th>
					 <th>Product ID</th>
					 <th>Automate ID</th>
	 			</tr>
	 			</thead>
	 			<tbody>
			<?php   
			foreach ($trade_list as $item)
			{ 
			
						echo '<tr>';
						echo '<th>', $item->id, '</th>';
						echo '<th>', $item->Name, '</th>';
						echo '<th>', $item->Price, '</th>';
						echo '<th>', $item->Quantity, '</th>';
						echo '<th>', $item->ProductId, '</th>';
						echo '<th>', $item->AutomateId, '</th>';
						echo '</tr>';
						
			}
				?>
				</tbody>
				</table>
		</p>
			

</article>

