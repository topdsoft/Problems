<?php
App::uses('AppController', 'Controller');
/**
 * Solutions Controller
 *
 * @property Solution $Solution
 */
class SolutionsController extends AppController {


	function chooseSolution($id=null) {
		$this->Solution->id = $id;
		if (!$this->Solution->exists()) {
			$this->Session->setFlash(__('Invalid Solution'));
			$this->redirect(array('controller'=>'problems','action' => 'index'));
		}
		$solution=$this->Solution->read(null, $id);
		$problem=$this->Solution->Problem->read(null,$solution['Solution']['problem_id']);
		if ($problem['Problem']['user_id']!=$this->Auth->user('id')) {
			$this->Session->setFlash(__('Invalid Solution'));
			$this->redirect(array('controller'=>'problems','action' => 'index'));
		}
		if ($problem['Problem']['solved']) {
			$this->Session->setFlash(__('Invalid Solution'));
			$this->redirect(array('controller'=>'problems','action' => 'index'));
		}
		//mark problem solved
		$this->Solution->Problem->save(array('Problem'=>array('id'=>$problem['Problem']['id'],'solved'=>date('Y-m-d H:i:s'))));
		//mark solution used
		$this->Solution->save(array('Solution'=>array('id'=>$solution['Solution']['id'],'chosen'=>true)));
		$this->Session->setFlash(__('Problem Marked Solved!'));
		$this->redirect(array('controller'=>'problems','action' => 'index'));
debug($problem);exit;
	}
}
