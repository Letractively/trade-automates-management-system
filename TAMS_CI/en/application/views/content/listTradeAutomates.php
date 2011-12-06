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
			<div id = pagination>
				<?php echo $pagination?>
			</div>

			<table>
				 <thead>
				 <tr>
					 <th>ID</th>
					 <th>Type</th>
					 <th>Owner ID</th>
					 <th>Owner Name</th>
					 <th>Location ID</th>
					 <th>City</th>
					 <th>Cash</th>
					 <th>Service</th>
					 <th>Sell amount</th>
					 <th>Registration date</th>
					 <th>Status ID</th>
					 <th>Is Working</th>
					 <th>No Goods</th>
					 <th>Full cash storage</th>
					 <th>Fault</th>
	 			</tr>
	 			</thead>
	 			<tbody>
			<?php   
			foreach ($trade_automates as $item)
			{ 
			
						echo '<tr>';
						echo '<th>', $item->TradeAutomatID, '</th>';
						echo '<th>', $item->Type, '</th>';
						echo '<th>', $item->OwnerID, '</th>';
						echo '<th>', $item->OwnerName, '</th>';
						echo '<th>', $item->LocationID, '</th>';
						echo '<th>', $item->City, '</th>';
						echo '<th>', $item->Cash, '</th>';
						echo '<th>', $item->Service, '</th>';
						echo '<th>', $item->SellAmount, '</th>';
						echo '<th>', $item->RegistrationDate, '</th>';
						echo '<th>', $item->StatusID, '</th>';
						echo '<th>', $item->IsWorking, '</th>';
						echo '<th>', $item->NoGoods, '</th>';
						echo '<th>', $item->FullCashStorage, '</th>';
						echo '<th>', $item->Fault, '</th>';
						echo '</tr>';
						
			}
				?>
				</tbody>
				</table>
		</p>
			

</article>

