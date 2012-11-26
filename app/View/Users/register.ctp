<?php
echo $this->Form->create('User', array('action' => 'register'));
?>
<fieldset>
	<legend><?php echo __('Create Account'); ?></legend>
	<?php
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	echo $this->Form->input('email');
	echo $this->Form->input('password', array('value' => ''));
	?>
</fieldset>
<?php
echo $this->Form->end(__('Register'));
