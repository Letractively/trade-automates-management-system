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
			echo form_open('add_task/save', $attributes); ?>

			<p>
			        <label for="trade_automat_id">Trade Automat ID <span class="required">*</span></label>
			        <?php echo form_error('trade_automat_id'); ?>
			        <br /><input id="trade_automat_id" type="text" name="trade_automat_id"  value="<?php echo set_value('trade_automat_id'); ?>"  />
			</p>

			<p>
			        <label for="worker_staff">Worker Staff <span class="required">*</span></label>
			        <?php echo form_error('worker_staff'); ?>
			        <br /><input id="worker_staff" type="text" name="worker_staff"  value="<?php echo set_value('worker_staff'); ?>"  />
			</p>

			<p>
			        <label for="description">Description <span class="required">*</span></label>
			        <?php echo form_error('description'); ?>
			        <br /><input id="description" type="text" name="description"  value="<?php echo set_value('description'); ?>"  />
			</p>


			<p>
			        <?php echo form_submit( 'submit', 'Submit'); ?>
			</p>
			<?php echo form_close(); ?>
				
		</p>
</article>