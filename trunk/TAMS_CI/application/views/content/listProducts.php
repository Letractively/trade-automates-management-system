<!DOCTYPE article PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a href="#"  rel="bookmark">
					Список продуктів
			</a>
		</h1>
		</br>
		</br>
		<a href="<?php echo base_url()?>index.php/admin/addProduct"><u>Add Product</u></a>
	</header>
		<p>
			<div id = pagination>
				<?php echo $pagination?>
			</div>
			<table>
				 <thead>
				 <tr>
				 <th>ID</th>
				 <th>Name</th>
				 <th>Description</th>
				 <th>Price</th>
				 <th>Image</th>
	 			</tr>
	 			</thead>
	 			<tbody>
			<?php   
			foreach ($products as $product){ 
						echo '<tr>';
						echo '<th>', $product->id , '</th>';
						echo '<th>', $product->Name , '</th>';
						echo '<th>', $product->Description, '</th>';
						echo '<th>', $product->Price, '</th>';
						echo '<th>', $product->Image, '</th>';
						echo '</tr>';
					}
				?>
				</tbody>
				</table>
		</p>
			

</article>

