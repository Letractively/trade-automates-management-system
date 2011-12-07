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
	</header>
		<p>
			<?php // Change the css classes to suit your needs    
			
			$attributes = array('class' => '', 'id' => '');
			echo form_open('admin/saveProduct', $attributes); ?>
			
			<p>
			        <label for="name">Name</label>
			        <?php echo form_error('name'); ?>
			        <br /><input id="name" type="text" name="name"  value="<?php echo set_value('name'); ?>"  />
			</p>
			
			<p>
			        <label for="description">Description</label>
			        <?php echo form_error('description'); ?>
			        <br /><input id="description" type="text" name="description"  value="<?php echo set_value('description'); ?>"  />
			</p>
			
			<p>
			        <label for="price">Price</label>
			        <?php echo form_error('price'); ?>
			        <br /><input id="price" type="text" name="price"  value="<?php echo set_value('price'); ?>"  />
			</p>
			
			<p>
			        <label for="image">Image</label>
			        <?php echo form_error('image'); ?>
			        
			        <input type="file" accept="image/jpeg" name="image">
			</p>                                             
			                        
			
			<p>
			        <?php echo form_submit( 'submit', 'Submit'); ?>
			</p>
			
			<?php echo form_close(); ?>
		
		</p>
</article>