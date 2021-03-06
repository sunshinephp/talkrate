<div class="talks form">
<?php echo $this->Form->create('Talk'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Tutorial'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Talk.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Talk.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Talks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Talk Ratings'), array('controller' => 'talk_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talk Rating'), array('controller' => 'talk_ratings', 'action' => 'add')); ?> </li>
	</ul>
</div>
