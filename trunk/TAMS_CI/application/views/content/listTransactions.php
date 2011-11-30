<!DOCTYPE article PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a href="#"  rel="bookmark">
					All made transactions
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
				 <th>Transaction ID</th>
				 <th>Product ID</th>
				 <th>Product Name</th>
				 <th>Amount</th>
				 <th>Received Money</th>
				 <th>Change</th>
				 <th>Trade Automat ID</th>
	 			</tr>
	 			</thead>
	 			<tbody>
			<?php   
			foreach ($transactions as $item)
			{ 
						echo '<tr>';
						echo '<th>', $item->id, '</th>';
						echo '<th>', $item->ProductID, '</th>';
						echo '<th>', $item->ProductName, '</th>';
						echo '<th>', $item->amount, '</th>';
						echo '<th>', $item->receivedMoney, '</th>';
						echo '<th>', $item->change, '</th>';
						echo '<th>', $item->automat, '</th>';
						echo '</tr>';
			}
				?>
				</tbody>
				</table>
		</p>
			

</article>

