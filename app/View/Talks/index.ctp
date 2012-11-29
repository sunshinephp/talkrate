<h2><?php echo __('Talks'); ?></h2>

<?php
if ($isAdmin) {
	?>
	<section class="tools">
		<?php echo $this->Html->link('Add Talk', array('controller' => 'talks', 'action' => 'add'), array('class' => array('btn', 'btn-primary'))); ?>
	</section>
	<?php
}
?>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('first_name'); ?></th>
		<th><?php echo $this->Paginator->sort('last_name'); ?></th>
		<th><?php echo $this->Paginator->sort('talk_level'); ?></th>
		<th><?php echo $this->Paginator->sort('talk_category'); ?></th>
		<th><?php echo $this->Paginator->sort('rating', 'Your Rating'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($talks as $talk): ?>
		<tr>
			<td><?php echo $this->Html->link($talk['Talk']['name'], array('action' => 'view', $talk['Talk']['id'])); ?>&nbsp;</td>
			<td><?php echo h($talk['Talk']['first_name']); ?>&nbsp;</td>
			<td><?php echo h($talk['Talk']['last_name']); ?>&nbsp;</td>
			<td><?php echo h($talk['Talk']['talk_level']); ?>&nbsp;</td>
			<td><?php echo h($talk['Talk']['talk_category']); ?>&nbsp;</td>
			<td>
				<div class="rating"></div>
			</td>
			<td class="actions">
				<?php
				echo $this->Html->link(__('Details'), array('action' => 'view', $talk['Talk']['id']), array('class' => 'btn'));
				?>

				<?php
				if ($isAdmin) {
					echo ' ' . $this->Html->link(__('Edit'), array('action' => 'edit', $talk['Talk']['id']), array('class' => 'btn'));
					echo ' ' . $this->Form->postLink(__('Delete'), array('action' => 'delete', $talk['Talk']['id']), array('class' => array('btn', 'btn-danger')), 'Are you sure you want to delete this talk?');
				}

				?>
			</td>
		</tr>
		<?php endforeach; ?>
</table>

<?php
echo $this->element('talks/rating_javascript');
