<!DOCTYPE article PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<LINK REL=StyleSheet HREF="<?php echo base_url()?>resources/profile.css" TYPE="text/css" MEDIA=screen>


<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a href="#"  rel="bookmark">
					<?php echo $user[0]->Name,', ', $user[0]->Surname?>
			</a>
		</h1>
	</header>
		<p>
			<table class="profile">
	 			<tbody>			
			<?php   
						echo '<tr>';
						echo '<th style="text-align: right; width: 20%;">', '<b>Role :</b>', '</th>';
						echo '<th style=" font-size: 14">', $role[0]->RoleName, '</th>';
						echo '</tr>';
						echo '<tr>';
						echo '<th style="text-align: right">', '<b>Login :</b>', '</th>';
						echo '<th style=" font-size: 14">', $user[0]->Login, '</th>';
						echo '</tr>';
						echo '<tr>';
						echo '<th style="text-align: right">', '<b>Email :</b>', '</th>';
						echo '<th style=" font-size: 14">', $user[0]->Email, '</th>';
						echo '</tr>';
						echo '<tr>';
						echo '<th style="text-align: right">', '<b>Balance :</b>', '</th>';
						echo '<th style=" font-size: 14">', $user[0]->Balance, '</th>';
						echo '</tr>';
						echo '<tr>';
						echo '<th style="text-align: right">', '<b>Trade Automates :</b>', '</th>';
						echo '<th style=" font-size: 14">';?> 
						
						<?php if ($_SESSION['user']->Role != '1') {?>
						<table>
						<tr style="font-size: 12px; padding:5px;">
					 <th style="font-size: 12px; padding:5px;">Type</th>
					 <th style="font-size: 12px; padding:5px;">Location ID</th>
					 <th style="font-size: 12px; padding:5px;">City</th>
					 <th style="font-size: 12px; padding:5px;">Cash</th>
					 <th style="font-size: 12px; padding:5px;">Service</th>
					 <th style="font-size: 12px; padding:5px;">Sell amount</th>
					 <th style="font-size: 12px; padding:5px;">Registration date</th>
					 <th style="font-size: 12px; padding:5px;">Status ID</th>
					 <th style="font-size: 12px; padding:5px;">Is Working</th>
					 <th style="font-size: 12px; padding:5px;">No Goods</th>
					 <th style="font-size: 12px; padding:5px;">Full cash storage</th>
					 <th style="font-size: 12px; padding:5px;">Fault</th>
	 			</tr>
	 			<tbody >
			<?php   
			foreach ($ta as $item)
			{ 
			
						echo '<tr>';
						echo '<th>', $item->Type, '</th>';
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
				<?php }
				else {
					echo 'NONE';
				}?>					
				<?php 
				echo '</th>';
						echo '</tr>';
				?>
				</tbody>
				</table>
		</p>
			

</article>

