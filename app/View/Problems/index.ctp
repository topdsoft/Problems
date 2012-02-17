<div class="problems index">
	<h2><?php echo __('Problems');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('solved');?></th>
			<th><?php echo $this->Paginator->sort('rank');?></th>
			<th><?php echo $this->Paginator->sort('notify');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($problems as $problem): ?>
	<tr>
		<td><?php echo h($problem['Problem']['id']); ?>&nbsp;</td>
		<td><?php echo h($problem['Problem']['name']); ?>&nbsp;</td>
		<td><?php echo h($problem['Problem']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($problem['Category']['name'], array('controller' => 'categories', 'action' => 'view', $problem['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($problem['User']['username'], array('controller' => 'users', 'action' => 'view', $problem['User']['id'])); ?>
		</td>
		<td><?php echo h($problem['Problem']['created']); ?>&nbsp;</td>
		<td><?php echo h($problem['Problem']['solved']); ?>&nbsp;</td>
		<td><?php echo h($problem['Problem']['rank']); ?>&nbsp;</td>
		<td><?php echo h($problem['Problem']['notify']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $problem['Problem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $problem['Problem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $problem['Problem']['id']), null, __('Are you sure you want to delete # %s?', $problem['Problem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Problem'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solutions'), array('controller' => 'solutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solution'), array('controller' => 'solutions', 'action' => 'add')); ?> </li>
	</ul>
</div>
