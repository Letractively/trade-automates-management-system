<!DOCTYPE article PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a href="#"  rel="bookmark">
					All possible roles
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
	 			</tr>
	 			</thead>
	 			<tbody>
			<?php   
			foreach ($roles as $item){ 
						echo '<tr>';
						echo '<th>', $item->id, '</th>';
						echo '<th>', $item->RoleName, '</th>';
						echo '</tr>';
					}
				?>
				</tbody>
				</table>
		</p>
			

</article>

