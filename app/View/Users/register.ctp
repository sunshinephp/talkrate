<section class="row">
	<?php
	echo $this->Form->create('User', array(
		'action' => 'register',
		'class' => 'span12',
		'inputDefaults' => array(
			'div' => array('class' => 'control-group'),
			'error' => array('attributes' => array('wrap' => 'label', 'class' => 'help-inline'))
		)
	));
	?>
	<fieldset>
		<legend><?php echo __('Create Account'); ?></legend>
		<?php
		echo $this->Form->input('first_name', array('error' => array('attributes' => array('wrap' => 'span', 'class' => 'bzzz'))));
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->input('password', array('value' => ''));
		?>
	</fieldset>
	<?php
	echo $this->Form->end(__('Register'));
	?>
</section>
