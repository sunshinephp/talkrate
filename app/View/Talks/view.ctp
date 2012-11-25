<div class="talks view">
<h2><?php  echo __('Talk'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bio'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['bio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Talk Level'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['talk_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Talk Category'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['talk_category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abstract'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['abstract']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Most Desired'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['is_most_desired']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Other Info'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['other_info']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slides'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['slides']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Sponsor'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['is_sponsor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Talk'), array('action' => 'edit', $talk['Talk']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Talk'), array('action' => 'delete', $talk['Talk']['id']), null, __('Are you sure you want to delete # %s?', $talk['Talk']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Talks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talk'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talk Ratings'), array('controller' => 'talk_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talk Rating'), array('controller' => 'talk_ratings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Talk Ratings'); ?></h3>
	<?php if (!empty($talk['TalkRating'])): ?>
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
		foreach ($talk['TalkRating'] as $talkRating): ?>
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
