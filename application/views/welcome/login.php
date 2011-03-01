<?php echo form_open('account/login'); ?>

	<?php echo text_field('usuari', "Username", 'mail@domain.com'); ?>

	<?php echo pass_field('password', 'Password', 'Password'); ?>

	<?php echo form_submit('login', 'Login'); ?>

<?php echo form_close(); ?>
