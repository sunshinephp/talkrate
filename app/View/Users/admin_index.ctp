<h2><?php echo __('Users'); ?></h2>
<section class="tools">
	<?php echo $this->Html->link(__('Add a User'), array('action' => 'add'), array('class' => array('btn', 'btn-primary'))); ?>
</section>
<table class="table table-striped table-bordered table-hover">
<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('first_name'); ?></th>
		<th><?php echo $this->Paginator->sort('last_name'); ?></th>
		<th><?php echo $this->Paginator->sort('email'); ?></th>
		<th><?php echo $this->Paginator->sort('is_approved'); ?></th>
		<th><?php echo $this->Paginator->sort('is_admin'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
</tr>
<?php
foreach ($users as $user): ?>
<tr>
	<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
	<td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
	<td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
	<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
	<td><?php echo h($user['User']['is_approved'] ? 'yes' : 'no'); ?>&nbsp;</td>
	<td><?php echo h($user['User']['is_admin'] ? 'yes' : 'no'); ?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link(__('View Details'), array('action' => 'view', $user['User']['id']), array('class' => 'btn')); ?>
		<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn')); ?>
		<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => array('btn', 'btn-danger')), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
