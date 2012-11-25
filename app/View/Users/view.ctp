<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talk Ratings'), array('controller' => 'talk_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talk Rating'), array('controller' => 'talk_ratings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Talk Ratings'); ?></h3>
	<?php if (!empty($user['TalkRating'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Talk Id'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['TalkRating'] as $talkRating): ?>
		<tr>
			<td><?php echo $talkRating['id']; ?></td>
			<td><?php echo $talkRating['user_id']; ?></td>
			<td><?php echo $talkRating['talk_id']; ?></td>
			<td><?php echo $talkRating['rating']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'talk_ratings', 'action' => 'view', $talkRating['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'talk_ratings', 'action' => 'edit', $talkRating['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'talk_ratings', 'action' => 'delete', $talkRating['id']), null, __('Are you sure you want to delete # %s?', $talkRating['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Talk Rating'), array('controller' => 'talk_ratings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
