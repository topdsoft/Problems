<div class="problems view">
<?php echo $this->Form->create('Problem');?>
<?php echo $this->Html->script(array('jquery-1.6.4.min'));?>
<h2><?php  echo h($problem['Problem']['name']);?></h2>
	<small> 
		<?php echo h($problem['Problem']['created']); ?>
		 by 
		<?php 
			$userinfo="Member Since: ".$problem['User']['created']."\nProblems Submitted:".$problem['User']['problems'];
			$userinfo.="\nSolutions Submitted:".$problem['User']['solutions']."\nSolutions:".$problem['User']['solved'];
			echo '<span title="'.$userinfo.'">'.h($problem['User']['username']).'</span>'; 
		?>
	</small><br>
	In Category:
	<?php echo $this->Html->link($problem['Category']['name'], array('controller' => 'categories', 'action' => 'view', $problem['Category']['id'])); ?><br>
	<?php if($problem['Problem']['solved']) echo "<strong>SOLVED:</stong> {$problem['Problem']['solved']} </strong><br>"; ?>
	<span class="probdesc">
	<?php echo nl2br($problem['Problem']['description']); ?>
	</span>
	<div id="enter">
	<?php
		echo $this->Form->input('Solution.description',array('label'=>'Enter your solution here:','type'=>'textarea'));
		echo $this->Form->end(__('Submit'));
	?>
	</div>
	<?php //debug($problem['Solution']);
		if(!empty($problem['Solution'])) {
			//show submitted solutions
			$i=0;
			foreach($problem['Solution'] as $solution) {
				//loop for all solutions
				$i++; 
				if($solution['chosen']) {
					//chosen!
					echo '<div class="probsol" style="border:dashed 2pt red; padding: 2px 5px;">';
					echo "<h3>Chosen Solution</h3>";
				} else {
					//not chosen
					echo '<div class="probsol">';
					echo "<h3>Submitted Solution #$i</h3>";
				}
				echo '<small>';
				echo h($solution['Problem']['created']).' by ';
				$userinfo="Member Since: ".$solution['User']['created']."\nProblems Submitted:".$solution['User']['problems'];
				$userinfo.="\nSolutions Submitted:".$solution['User']['solutions']."\nSolutions:".$solution['User']['solved'];
				echo '<span title="'.$userinfo.'">'.h($solution['User']['username']).'</span>'; 
				echo '</small><br>';
				echo nl2br($solution['description']);
				if(!$problem['Problem']['solved'] && $this->Session->read('Auth.User.id')==$problem['Problem']['user_id']) {
					//show option to solve
					echo '<br><br><span class="actions">';
					echo $this->Html->link(__('Choose Solution #'.$i),array('controller'=>'solutions','action'=>'chooseSolution',$solution['id']),
						array('title'=>'Click here to mark your problem as solved and choose this solution.'));
					echo '</span><br><br>';
				}//endif
				echo '</div>';
			}//end foreach
		}//endif
		if(!$problem['Problem']['solved']) {
			//show options for submitting solutions
			if($this->Session->read('Auth.User.username')) {
				//user is logged in
				echo '<br><span class="actions">';
				echo $this->Html->link(__('Submit Solution'), 'javascript:showenter();');
				echo '</span>';
			} else {
				//not logged in
				echo 'To submit a solution for this problem ';
				echo $this->Html->link('Register', array('controller'=>'users','action'=>'register'));
				echo ' or ';
				echo $this->Html->link('Login', array('controller'=>'users','action'=>'login'));
			}
		}//endif
	?>
</div>
<script type='text/javascript'>
//<!--
$(function(){
	//initially hide
	$("#enter").hide();
});
function showenter() {
	$("#enter").slideDown();
	$(".actions").hide();
	$("#SolutionDescription").focus();
}
//-->
</script>
