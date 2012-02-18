<?php
	function echoMenu($obj,$label,$link) {
		//outputs menu as link or static
		if($obj->request->params['controller']==$link['controller']) $color='white';
		else $color='#ccc';
		echo '<li style="border-bottom:1px '.$color.' solid;">'.$obj->Html->link(__($label),$link).'</li>';
	}
?>
<div id="menu">
	<ul>
		<?php
			echoMenu($this,'Home',array('controller'=>'pages','action'=>'home'));
			echoMenu($this,'Problems',array('controller'=>'problems','action'=>'index'));
			echoMenu($this,'Categories',array('controller'=>'categories','action'=>'index'));
			if($this->Session->read('Auth.User.username')) echoMenu($this,'Setup',array('controller'=>'users','action'=>'setup'));
			echoMenu($this,'About',array('controller'=>'pages','action'=>'home'));
//			echoMenu($this,,);
		?>
	</ul>
</div>