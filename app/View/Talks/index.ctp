<h2><?php echo __('Talks'); ?></h2>

<?php
if ($isAdmin) {
	?>
	<section class="tools">
		<?php echo $this->Html->link('Add Talk', array('controller' => 'talks', 'action' => 'add'), array('class' => array('btn', 'btn-primary'))); ?>
		<?php echo $this->Html->link('Upload Talks', array('controller' => 'talks', 'action' => 'upload'), array('class' => array('btn'))); ?>
        <?php echo $this->Html->link('Import OpenCFP Talks', array('controller' => 'talks', 'action' => 'cfpimport'), array('class' => array('btn'))); ?>
		<?php echo $this->Html->link('Export Talks & Ratings', array('controller' => 'talk_ratings', 'action' => 'export'), array('class' => array('btn'))); ?>
	</section>
	<?php
}
echo $this->element('pagination');
?>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th nowrap><?php echo $this->Paginator->sort('Talk.name', 'Name'); ?></th>
		<th nowrap><?php echo $this->Paginator->sort('Talk.first_name', 'First Name'); ?></th>
		<th nowrap><?php echo $this->Paginator->sort('Talk.last_name', 'Last Name'); ?></th>
		<th nowrap><?php echo $this->Paginator->sort('Talk.talk_level', 'Level'); ?></th>
		<th nowrap><?php echo $this->Paginator->sort('Talk.talk_category', 'Category'); ?></th>
		<th nowrap><?php echo $this->Paginator->sort('TalkRating.rating', 'Your Rating'); ?></th>
		<th nowrap><?php echo $this->Paginator->sort('Talk.created', 'Submitted'); ?></th>
		<th nowrap class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($talks as $talk): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($talk['Talk']['name'], array('action' => 'view', $talk['Talk']['id'])); ?>&nbsp;
				<?php
				if ($talk['Talk']['is_most_desired']) {
					?>
                    <span class="label label-info">Most Desired</span>
					<?php
				}
				?>

				<?php
				if ($talk['Talk']['is_sponsor']) {
					?>
                    <span class="label label-success">Sponsor</span>
					<?php
				}
				?>
			</td>
			<td nowrap><?php echo h($talk['Talk']['first_name']); ?>&nbsp;</td>
			<td nowrap><?php echo h($talk['Talk']['last_name']); ?>&nbsp;</td>
			<td nowrap><?php echo h($talk['Talk']['talk_level']); ?>&nbsp;</td>
			<td nowrap><?php echo h($talk['Talk']['talk_category']); ?>&nbsp;</td>
			<td nowrap>
				<?php
				$user_rating = isset($talk['Talk']['user_rating']) ? (integer) $talk['Talk']['user_rating'] : 0;
				?>
				<div class="rating"
					 data-rating="<?php echo $talk['TalkRating']['rating'] ?>"
					 data-rateit-value="<?php echo $talk['TalkRating']['rating'] ?>"
					 data-talk-id="<?php echo $talk['Talk']['id'] ?>"></div>
			</td>
			<td nowrap>
				<?php echo h($talk['Talk']['created']); ?>
			</td>
			<td nowrap class="actions">
				<?php
				echo $this->Html->link(__('View Details'), array('action' => 'view', $talk['Talk']['id']), array('class' => 'btn'));
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
echo $this->element('pagination');
echo $this->element('Talks/rating_javascript');
