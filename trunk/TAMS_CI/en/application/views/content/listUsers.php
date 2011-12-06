<!DOCTYPE article PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a href="#"  rel="bookmark">
					All registered users
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
				 <th>Rolename</th>
				 <th>Name</th>
				 <th>Surname</th>
				 <th>Login</th>
				 <th>Password</th>
				 <th>Email</th>
				 <th>Balance</th>
	 			</tr>
	 			</thead>
	 			<tbody>
			<?php   
			foreach ($users as $item)
			{ 
						echo '<tr>';
						echo '<th>', $item->id, '</th>';
						echo '<th>', $item->RoleName, '</th>';
						echo '<th>', $item->Name, '</th>';
						echo '<th>', $item->Surname, '</th>';
						echo '<th>', $item->Login, '</th>';
						echo '<th>', $item->Password, '</th>';
						echo '<th>', $item->Email, '</th>';
						echo '<th>', $item->Balance, '</th>';
						echo '</tr>';
			}
				?>
				</tbody>
				</table>
		</p>
			

</article>

