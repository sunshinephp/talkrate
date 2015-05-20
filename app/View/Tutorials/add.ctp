<div class="talks form">
<?php
	echo $this->Form->create('Talk', array(
		'class' => 'span12',
		'inputDefaults' => array(
			'div' => array('class' => 'control-group'),
			'error' => array('attributes' => array('wrap' => 'label', 'class' => 'help-inline'))
		)
	));
	?>
	<fieldset>
		<legend><?php echo __('Admin Add Tutorial'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->input('bio');
		echo $this->Form->input('speaker_info');
		echo $this->Form->input('talk_level');
		echo $this->Form->input('talk_track');
		echo $this->Form->input('talk_category');
		echo $this->Form->input('abstract');
		echo $this->Form->input('is_most_desired');
		echo $this->Form->input('other_info');
		echo $this->Form->input('slides');
		echo $this->Form->input('is_sponsor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
