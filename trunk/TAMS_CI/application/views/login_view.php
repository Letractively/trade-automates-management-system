<!DOCTYPE html>

<html lang= "en">
<head>
<meta charset="utf-8">
<title>untitled</title>
<style> label { display: block; } .errors { color: red; }</style>
</head>
<body>
<h1>Login</h1>
<?php echo form_open('admin'); ?>
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

</body>
</html>

