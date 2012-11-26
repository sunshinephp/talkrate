<div class="row">
	<section class="span4">
		<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend><?php echo __('Log In'); ?></legend>
			<?php
			echo $this->Form->input('email');
			echo $this->Form->input('password', array('value' => ''));
			?>
		</fieldset>
		<?php echo $this->Form->end(__('Log In')); ?>
	</section>

	<section class="span4 offset2">
		<?php echo $this->Form->create('User', array('action' => 'register')); ?>
		<fieldset>
			<legend><?php echo __('Create Account'); ?></legend>
			<?php
			echo $this->Form->input('first_name');
			echo $this->Form->input('last_name');
			echo $this->Form->input('email');
			echo $this->Form->input('password', array('value' => ''));
			?>
		</fieldset>
		<?php echo $this->Form->end(__('Register')); ?>
	</section>

</div>
