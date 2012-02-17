<div class="problems view">
<h2><?php  echo __('Problem');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($problem['Category']['name'], array('controller' => 'categories', 'action' => 'view', $problem['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($problem['User']['username'], array('controller' => 'users', 'action' => 'view', $problem['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Solved'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['solved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['rank']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notify'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['notify']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Problem'), array('action' => 'edit', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Problem'), array('action' => 'delete', $problem['Problem']['id']), null, __('Are you sure you want to delete # %s?', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solutions'), array('controller' => 'solutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solution'), array('controller' => 'solutions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Solutions');?></h3>
	<?php if (!empty($problem['Solution'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Problem Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Chosen'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($problem['Solution'] as $solution): ?>
		<tr>
			<td><?php echo $solution['id'];?></td>
			<td><?php echo $solution['description'];?></td>
			<td><?php echo $solution['problem_id'];?></td>
			<td><?php echo $solution['created'];?></td>
			<td><?php echo $solution['user_id'];?></td>
			<td><?php echo $solution['chosen'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'solutions', 'action' => 'view', $solution['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'solutions', 'action' => 'edit', $solution['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'solutions', 'action' => 'delete', $solution['id']), null, __('Are you sure you want to delete # %s?', $solution['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Solution'), array('controller' => 'solutions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
