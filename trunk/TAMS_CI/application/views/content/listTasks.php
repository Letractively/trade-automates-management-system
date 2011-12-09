<!DOCTYPE article PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a href="#"  rel="bookmark">
					Tasks
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
				 		<!--	tasks.CreationTime,
							location.city,
							location.street,
							location.coordinates,
							tasks.Description,
							users.name,
							trade_automats.id as 'TradeAutomatID',
							users.id as 'UserID'
						-->
						
					 <th>Creation Time</th>
					 <th>City</th>
					 <th>Street</th>
					 <th>Coordinates</th>
					 <th>Description</th>
					 <th>Assigned to</th>
					 <th>Trade Automat ID</th>
					 <th>User ID</th>
	 			</tr>
	 			</thead>
	 			<tbody>
			<?php   
			foreach ($tasks as $item)
			{ 
			
						echo '<tr>';
						echo '<th>', $item->CreationTime, '</th>';
						echo '<th>', $item->city, '</th>';
						echo '<th>', $item->street, '</th>';
						echo '<th>', $item->coordinates, '</th>';
						echo '<th>', $item->Description, '</th>';
						echo '<th>', $item->name, '</th>';
						echo '<th>', $item->TradeAutomatID, '</th>';
						echo '<th>', $item->UserID, '</th>';
						echo '</tr>';
						
			}
			
			if($_SESSION['user']->Role <= 2)
			{
						echo '<tr>';
						echo '<th colspan="5"><a href="', base_url(), 'index.php/add_task/index">+ Add New Task</a></th>';
						echo '</tr>';
			}
			
				?>
				</tbody>
				</table>
		</p>
			

</article>

