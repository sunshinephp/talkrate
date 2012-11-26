<?php
$registerLink = $this->Html->link('Register Now', array('controller' => 'users', 'action' => 'register'));
?>
<p>
	Need an account? <?php echo $registerLink ?>
</p>
<?php
echo $this->Form->create('User');
?>
<fieldset>
	<legend><?php echo __('Log In'); ?></legend>
	<?php
	echo $this->Form->input('email');
	echo $this->Form->input('password', array('value' => ''));
	?>
</fieldset>
<?php
echo $this->Form->end(__('Log In'));
