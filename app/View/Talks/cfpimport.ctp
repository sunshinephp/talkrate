<?php //print_r($cfpUsers); ?>
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
        <legend><?php echo __('Import CFP Talks'); ?></legend>
        <p>
			Clicking "Process CFP" below will import cfp talk submissions from the Open CFP application.<br /><br />
            
            <strong>NOTE: These will be imported as an addition to talks already in the system, and may cause duplicates.</strong>
        </p>
		<?php
		echo $this->Form->input('cfp', array('type' => 'hidden', 'value' => 'process'));
		?>
    </fieldset>
	<?php echo $this->Form->end(__('Process CFP')); ?>
</div>
