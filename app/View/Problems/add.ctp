<div class="problems form">
<?php echo $this->Form->create('Problem');?>
	<fieldset>
		<legend><?php echo __('Submit Your Problem'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'Give a brief name for your problem:'));
		echo $this->Form->input('description',array('label'=>'Describe your problem here:'));
		echo $this->Form->input('category_id');
		echo $this->Form->input('notify',array('label'=>'Notify me by email when users submit solutions for this problem'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
