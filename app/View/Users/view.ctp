<div class="users view">
<h2><?php  echo __('User');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hash'); ?></dt>
		<dd>
			<?php echo h($user['User']['hash']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LastVote'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastVote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LastLogin'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastLogin']); ?>
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
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solutions'), array('controller' => 'solutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solution'), array('controller' => 'solutions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Problems');?></h3>
	<?php if (!empty($user['Problem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Solved'); ?></th>
		<th><?php echo __('Rank'); ?></th>
		<th><?php echo __('Notify'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Problem'] as $problem): ?>
		<tr>
			<td><?php echo $problem['id'];?></td>
			<td><?php echo $problem['name'];?></td>
			<td><?php echo $problem['description'];?></td>
			<td><?php echo $problem['category_id'];?></td>
			<td><?php echo $problem['user_id'];?></td>
			<td><?php echo $problem['created'];?></td>
			<td><?php echo $problem['solved'];?></td>
			<td><?php echo $problem['rank'];?></td>
			<td><?php echo $problem['notify'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'problems', 'action' => 'view', $problem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'problems', 'action' => 'edit', $problem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'problems', 'action' => 'delete', $problem['id']), null, __('Are you sure you want to delete # %s?', $problem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Solutions');?></h3>
	<?php if (!empty($user['Solution'])):?>
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
		foreach ($user['Solution'] as $solution): ?>
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
