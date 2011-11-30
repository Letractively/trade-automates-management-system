<!DOCTYPE html>


<meta charset="utf-8">
<style> label { display: block; } .errors { color: red; }</style>

<article>
	<header>
		<time datetime="2011-04-26" pubdate>
				<span><?php date_default_timezone_set('Europe/Kiev'); echo date("M");?></span> 
				<?php echo date("d");?>
		</time>
		<h1>
			<a style="text-align:center;">
					Login
			</a>
		</h1>
	</header>
		<?php echo form_open('login'); ?>
		<p>
		<?php
		echo form_label('Email:', 'email_address');
		echo form_input('email_address', '', 'id="email_address"');
		?>
		</p>
		<p>
		<?php
		echo form_label('Password', 'password');
		echo form_password('password', '', 'id="password"');
		?>
		</p>
		<p>
		<?php echo form_submit('submit', 'Login'); ?>
		</p>
		<?php echo form_close(); ?>
		
		<div class="errors"> <?php echo validation_errors(); ?> </div>
</article>


