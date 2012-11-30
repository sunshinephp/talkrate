<div class="talks form">
	<?php
	echo $this->Form->create('Talk', array(
		'type' => 'file',
		'class' => 'span12',
		'inputDefaults' => array(
			'div' => array('class' => 'control-group'),
			'error' => array('attributes' => array('wrap' => 'label', 'class' => 'help-inline'))
		)
	));
	?>
    <fieldset>
        <legend><?php echo __('Upload Talks'); ?></legend>
		<?php
		echo $this->Form->input('csv', array('type' => 'file', 'label' => 'Upload a CSV'));
		?>
    </fieldset>
	<?php echo $this->Form->end(__('Upload')); ?>
</div>
