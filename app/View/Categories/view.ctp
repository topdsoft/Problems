<div class="categories view">
<h2><?php  echo __('Category: '.$catName);?></h2>
</div>
<div class="related">
	<?php if (!empty($problems)):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('user_id');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('rank');?></th>
		<th class="actions"></th>
	</tr>
	<?php
		$i = 0;
		foreach ($problems as $problem): ?>
		<tr>
		<td>
			<?php echo $this->Html->link($problem['Problem']['name'], array('controller'=>'problems','action'=>'view',$problem['Problem']['id'])); ?>&nbsp;
		</td>
		<td><?php echo h($problem['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($problem['Problem']['created']); ?>&nbsp;</td>
		<td><?php echo h($problem['Problem']['rank']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller'=>'problems','action' => 'view', $problem['Problem']['id'])); ?>
			<?php if($problem['Problem']['user_id']==$uid)echo $this->Html->link(__('Edit'), array('controller'=>'problems','action' => 'edit', $problem['Problem']['id'])); ?>
			<?php if($problem['Problem']['user_id']==$uid)echo $this->Form->postLink(__('Delete'), array('controller'=>'problems','action' => 'delete', $problem['Problem']['id']), null, 
			__('Are you sure you want to delete your problem: %s?', $problem['Problem']['name'])); ?>
		</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
