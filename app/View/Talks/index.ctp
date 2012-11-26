<div class="talks index">
	<h2><?php echo __('Talks'); ?></h2>
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
		<li><?php echo $this->Html->link(__('New Talk'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Talk Ratings'), array('controller' => 'talk_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talk Rating'), array('controller' => 'talk_ratings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="rateit" data-rateit-value="2.25" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
<select id="backing2b">
    <option value="0"></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select>
<div class="rateit" data-rateit-backingfld="#backing2b"></div>
<?php echo $this->html->script('http://code.jquery.com/jquery-1.8.3.min.js') ?>
<?php echo $this->html->script('/js/jquery.rateit/jquery.rateit.js') ?>
<?php echo $this->html->css('/js/jquery.rateit/rateit.css') ?>
<script>
(function($) {
	$(document).ready(function() {
		var $el = $('.rateit').eq(1);
		$el.on('rated', function(e, value) {
			alert('rated at: ' + value);
		});
	});
}(window.jQuery));
</script>
