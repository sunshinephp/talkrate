<h2><?php echo h($talk['Talk']['name']); ?></h2>

<?php
if ($isAdmin) {
	?>
<section class="tools">
	<?php echo $this->Html->link('Edit Tutorial', array('action' => 'edit', $talk['Talk']['id']), array('class' => 'btn')); ?>
    <?php echo $this->Form->postLink(__('Delete Tutorial'), array('action' => 'delete', $talk['Talk']['id']), array('class' => array('btn', 'btn-danger')), __('Are you sure you want to delete # %s?', $talk['Talk']['id'])); ?>
</section>
<?php
}
?>
<hr />

<section>
	<ul>
		<?php
		if (!empty($neighbors['prev']['Talk'])) {
			?>
            <li><?php echo 'Previous tutorial: ' . $this->Html->link($neighbors['prev']['Talk']['name'], array('action' => 'view', h($neighbors['prev']['Talk']['id']))); ?></li>

			<?php
		}

		if (!empty($neighbors['next']['Talk'])) {
			?>
            <li><?php echo 'Next tutorial: ' . $this->Html->link($neighbors['next']['Talk']['name'], array('action' => 'view', h($neighbors['next']['Talk']['id']))); ?></li>
			<?php
		} else {
            ?>
            <li><?php echo 'This was the last tutorial, remember to rate ' . $this->Html->link('Talks', '/talks'); ?></li>
            <?php
        }
		?>
	</ul>
</section>
<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Your Rating'); ?></dt>
		<dd>
			<?php
			$user_rating = isset($talk['Talk']['user_rating']) ? (integer) $talk['Talk']['user_rating'] : 0;
			?>
            <div class="rating"
                 data-rating="<?php echo $talk['TalkRating']['rating'] ?>"
                 data-rateit-value="<?php echo $talk['TalkRating']['rating'] ?>"
                 data-talk-id="<?php echo $talk['Talk']['id'] ?>"></div>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($talk['Talk']['name']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Talk Type'); ?></dt>
        <dd>
            <?php echo h($talk['Talk']['talk_type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Talk Track'); ?></dt>
        <dd>
            <?php echo h($talk['Talk']['talk_track']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Talk Category'); ?></dt>
        <dd>
            <?php echo h($talk['Talk']['talk_category']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Talk Level'); ?></dt>
        <dd>
            <?php echo h($talk['Talk']['talk_level']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Abstract'); ?></dt>
        <dd>
            <?php echo nl2br(h($talk['Talk']['abstract'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Is Most Desired'); ?></dt>
        <dd>
            <?php echo h($talk['Talk']['is_most_desired']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Other Talk Info'); ?></dt>
        <dd>
            <?php echo nl2br(h($talk['Talk']['other_info'])); ?>
            &nbsp;
        </dd>
        <?php
        if ($talk['Talk']['slides']) {
            ?>
            <dt><?php echo __('Slides'); ?></dt>
            <dd>
                <?php echo $this->Html->link($talk['Talk']['slides'], $talk['Talk']['slides'], array('escape' => false, 'target' => '_blank')); ?>
                <span class="label label-info">Opens in a New Window</span>
                &nbsp;
            </dd>
            <?php
        }
        ?>
        <h2>Speaker Info</h2>
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
		<dt><?php echo __('Other Speaker Info'); ?></dt>
		<dd>
			<?php echo nl2br(h($talk['Talk']['speaker_info'])); ?>
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

<?php
echo $this->element('Talks/rating_javascript');
