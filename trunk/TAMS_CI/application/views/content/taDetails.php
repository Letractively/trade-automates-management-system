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
					 <th>ID</th>
					 <?php echo '<th style=" font-weight: normal;">', $trade_automates[0]->id, '</th>';?>
				</tr>
				<tr>
					 <th>Type</th>
					 <?php echo '<th style=" font-weight: normal;">', $trade_automates[0]->Type, '</th>';?>
				</tr>
				<tr>
					 <th>Owner</th>
					 <?php echo '<th style=" font-weight: normal;">', 
					 'Name:  ',$owner[0]->Name, 
					 '</br>' ,'Surname:  ', $owner[0]->Surname,
					 '</br>' ,'Email:  ', $owner[0]->Email,
					 '</br>' ,'Balance:  ', $owner[0]->Balance,
					 '</th>';?>
				</tr>
				<tr>
					 <th>Location ID</th>
					 <?php echo '<th style=" font-weight: normal;">',
					 'City:  ', $location[0]->City,
					 '</br>' ,'Street:  ', $location[0]->Street,
					 '</br>' ,'Coordinates:  ', $location[0]->Coordinates,
					 '</th>';?>
				</tr>
				<tr>
					 <th>Cash</th>
					 <?php echo '<th style=" font-weight: normal;">', $trade_automates[0]->Cash, '</th>';?>
				</tr>
				<tr>
					 <th>Service</th>
					 <?php echo '<th style=" font-weight: normal;">',
					 'Name:  ', $service[0]->Name,
					 '</br>' ,'Surname:  ', $service[0]->Surname,
					 '</br>' ,'Login:  ', $service[0]->Login,
					 '</br>' ,'Email:  ', $service[0]->Email,
					 '</br>' ,'Balance:  ', $service[0]->Balance,
					 '</th>';?>
				</tr>
				<tr>
					 <th>Sell amount</th>
					 <?php echo '<th style=" font-weight: normal;">', $trade_automates[0]->SellAmount, '</th>';?>
				</tr>
				<tr>
					 <th>Registration date</th>
					 <?php echo '<th style=" font-weight: normal;">', $trade_automates[0]->RegistrationDate, '</th>';?>
				</tr>
				<tr>
					 <th>Status</th>
					 <?php echo '<th style=" font-weight: normal;">', $trade_automates[0]->TradeAutomatID, '</th>';?>
				</tr>
				<tr>
					 <th>Is Working</th>
					 <?php echo '<th style=" font-weight: normal;">', $trade_automates[0]->IsWorking, '</th>';?>
				</tr>
	 			</tbody>
				</table>
		</p>
			

</article>

