<div class="talkRatings view">
<h2><?php  echo __('Talk Rating'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($talkRating['TalkRating']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($talkRating['User']['name'], array('controller' => 'users', 'action' => 'view', $talkRating['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Talk'); ?></dt>
		<dd>
			<?php echo $this->Html->link($talkRating['Talk']['name'], array('controller' => 'talks', 'action' => 'view', $talkRating['Talk']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($talkRating['TalkRating']['rating']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Talk Rating'), array('action' => 'edit', $talkRating['TalkRating']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Talk Rating'), array('action' => 'delete', $talkRating['TalkRating']['id']), null, __('Are you sure you want to delete # %s?', $talkRating['TalkRating']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Talk Ratings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talk Rating'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talks'), array('controller' => 'talks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talk'), array('controller' => 'talks', 'action' => 'add')); ?> </li>
	</ul>
</div>
