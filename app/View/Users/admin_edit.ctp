<div class="users form">
	<?php
	echo $this->Form->create('User', array(
		'class' => 'span12',
		'inputDefaults' => array(
			'div' => array('class' => 'control-group'),
			'error' => array('attributes' => array('wrap' => 'label', 'class' => 'help-inline'))
		)
	));
	?>
	<fieldset>
		<legend><?php echo __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		//echo $this->Form->input('password');
		echo $this->Form->input('is_approved');
		echo $this->Form->input('is_admin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
