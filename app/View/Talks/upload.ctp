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
        <p>
			Csv should have no headers and follow the following column format: <br />
			first name, last name, email, bio, location, talk level, talk category, talk title, abstract, most desired (blank if not), slides url, other info
			<br />
			Please set encoding to UTF 8 w/o BOM and double quote all text fields
        </p>
		<?php
		echo $this->Form->input('csv', array('type' => 'file', 'label' => 'Upload a CSV'));
		?>
    </fieldset>
	<?php echo $this->Form->end(__('Upload')); ?>
</div>
