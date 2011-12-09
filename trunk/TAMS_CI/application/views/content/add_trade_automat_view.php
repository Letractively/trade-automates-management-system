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

		<p>
				<?php // Change the css classes to suit your needs    

				$attributes = array('class' => '', 'id' => '');       
				echo form_open('add_trade_automat/save', $attributes); ?>

				<p>
						<label for="trade_automat_id">Trade Automat ID <span class="required">*</span></label>
						<?php echo form_error('trade_automat_id'); ?>
						<br /><input id="trade_automat_id" type="text" name="trade_automat_id"  value="<?php echo set_value('trade_automat_id'); ?>"  />
				</p>

				<p>
						<label for="type">Type <span class="required">*</span></label>
						<?php echo form_error('type'); ?>
						<br /><input id="type" type="text" name="type"  value="<?php echo set_value('type'); ?>"  />
				</p>

				<p>
						<label for="service_id">Service ID <span class="required">*</span></label>
						<?php echo form_error('service_id'); ?>
						<br /><input id="service_id" type="text" name="service_id"  value="<?php echo set_value('service_id'); ?>"  />
				</p>


				<p>
						<?php echo form_submit( 'submit', 'Submit'); ?>
				</p>

				<?php echo form_close(); ?>

						
		</p>
</article>