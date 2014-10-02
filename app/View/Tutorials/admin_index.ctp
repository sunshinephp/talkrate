<div class="talks index">
	<h2><?php echo __('Tutorials'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('bio'); ?></th>
			<th><?php echo $this->Paginator->sort('location'); ?></th>
			<th><?php echo $this->Paginator->sort('talk_level'); ?></th>
			<th><?php echo $this->Paginator->sort('talk_category'); ?></th>
			<th><?php echo $this->Paginator->sort('abstract'); ?></th>
			<th><?php echo $this->Paginator->sort('is_most_desired'); ?></th>
			<th><?php echo $this->Paginator->sort('other_info'); ?></th>
			<th><?php echo $this->Paginator->sort('slides'); ?></th>
			<th><?php echo $this->Paginator->sort('is_sponsor'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($talks as $talk): ?>
	<tr>
		<td><?php echo h($talk['Talk']['id']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['name']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['email']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['bio']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['location']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['talk_level']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['talk_category']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['abstract']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['is_most_desired']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['other_info']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['slides']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['is_sponsor']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['created']); ?>&nbsp;</td>
		<td><?php echo h($talk['Talk']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $talk['Talk']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $talk['Talk']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $talk['Talk']['id']), null, __('Are you sure you want to delete # %s?', $talk['Talk']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tutorial'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tutorial Ratings'), array('controller' => 'talk_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tutorial Rating'), array('controller' => 'talk_ratings', 'action' => 'add')); ?> </li>
	</ul>
</div>