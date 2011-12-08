<!DOCTYPE article PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a >
					Trade automat details
			</a>
		</h1>
	</header>
		<p>

			<table>
			<tbody>
				 <tr>
					 <th style="text-align: right; padding: 10px; padding: 10px">ID :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">',
					  $trade_automates[0]->id, '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right; padding: 10px">Type :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">',
					  $trade_automates[0]->Type, '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right; padding: 10px">Owner :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">', 
					 'Name:  ',$owner[0]->Name, 
					 '</br>' ,'Surname:  ', $owner[0]->Surname,
					 '</br>' ,'Email:  ', $owner[0]->Email,
					 '</br>' ,'Balance:  ', $owner[0]->Balance,
					 '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right; padding: 10px">Location ID :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">',
					 'City:  ', $location[0]->City,
					 '</br>' ,'Street:  ', $location[0]->Street,
					 '</br>' ,'Coordinates:  ', $location[0]->Coordinates,
					 '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right; padding: 10px">Cash :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">', 
					 $trade_automates[0]->Cash, '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right; padding: 10px">Service :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">',
					 'Name:  ', $service[0]->Name,
					 '</br>' ,'Surname:  ', $service[0]->Surname,
					 '</br>' ,'Login:  ', $service[0]->Login,
					 '</br>' ,'Email:  ', $service[0]->Email,
					 '</br>' ,'Balance:  ', $service[0]->Balance,
					 '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right; padding: 10px">Selling products :</th>
					 <?php   echo '<th style=" font-weight: normal; text-align: left; padding: 10px">';
					 	echo '<table style=" borders: 1px">';
					 	echo '<tr>';
					 	echo '<th>', 'Name', '</th>';
					 	echo '<th>', 'Description', '</th>';
					 	echo '<th>', 'Price', '</th>';
					 	echo '<th>', 'Quantity', '</th>';
					 	echo '<th>', 'Image', '</th>';
					 	echo '</tr>';
					 	
						foreach ($selling_list as $item)
						{ 
							echo '<tr>';
							echo '<th style=" font-weight: normal;">', $item->Name, '</th>';
							echo '<th style=" font-weight: normal;">', $item->Description, '</th>';
							echo '<th style=" font-weight: normal;">', $item->Price, '</th>';
							echo '<th style=" font-weight: normal;">', $item->Quantity, '</th>';
							echo '<th style=" font-weight: normal;">', $item->Image, '</th>';
							echo '<?tr>';
									
						}
						echo '</table>'
				?>
				</tr>
				<tr>
					 <th style="text-align: right; padding: 10px">Sell amount :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">', $trade_automates[0]->SellAmount, '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right; padding: 10px">Registration date :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">', $trade_automates[0]->RegistrationDate, '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right; padding: 10px">Status :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">',
					 'No Goods:  ', $trade_automates[0]->NoGoods,
					 '</br>' ,'Full Cash Storage:  ', $trade_automates[0]->FullCashStorage,
					 '</br>' ,'Fault:  ', $trade_automates[0]->Fault,
					 '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right">Is Working :</th>
					 <?php echo '<th style=" font-weight: normal; text-align: left; padding: 10px">', $trade_automates[0]->IsWorking, '</th>';?>
				</tr>
				<tr>
					 <th style="text-align: right">Transactions :</th>
					 <th style=" font-weight: normal; text-align: left; padding: 10px">
						 <a href="javscript://" class="splLink"><strong>Show:</strong> all transactions</a>
						 <div class="splCont" style="display:none; padding:3px 5px;"> 
							<?php 
							 	echo '<table style=" borders: 1px">';
							 	echo '<tr>';
							 	echo '<th>', 'ID', '</th>';
							 	echo '<th>', 'Product', '</th>';
							 	echo '<th>', 'Price', '</th>';
							 	echo '<th>', 'Amount', '</th>';
							 	echo '<th>', 'Received money', '</th>';
							 	echo '<th>', 'Change', '</th>';
							 	echo '</tr>';
							 	
								foreach ($transactions as $item)
								{ 
									echo '<tr>';
									echo '<th style=" font-weight: normal;">', $item->id, '</th>';
									echo '<th style=" font-weight: normal;">', $item->Name, '</th>';
									echo '<th style=" font-weight: normal;">', $item->Price, '</th>';
									echo '<th style=" font-weight: normal;">', $item->amount, '</th>';
									echo '<th style=" font-weight: normal;">', $item->receivedMoney, '</th>';
									echo '<th style=" font-weight: normal;">', $item->change, '</th>';
									echo '<?tr>';
											
								}
								echo '</table>'
							?>
						 </div>
					 </th>
				</tr>
	 			</tbody>
				</table>
		</p>
			

</article>

