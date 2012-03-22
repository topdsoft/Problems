<?php
App::uses('AppController', 'Controller');
/**
 * Problems Controller
 *
 * @property Problem $Problem
 */
class ProblemsController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow('index','view');
		parent::beforeFilter();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Problem->recursive = 0;
		//check params
		$conditions=array();
		if(!isset($this->request->params['named']['all'])){
			//hide solved problems
		}//endif
		if(isset($this->request->params['named']['cat'])){
			//filter by category
		}
		$this->set('problems', $this->paginate());
		$this->set('uid',$this->Auth->user('id'));
		
//debug($this->request->params['named']);exit;
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Problem->recursive = 2;
		$this->Problem->id = $id;
		if (!$this->Problem->exists()) {
			throw new NotFoundException(__('Invalid problem'));
		}
		$this->set('problem', $this->Problem->read(null, $id));
		if ($this->request->is('post')) {
			$this->Problem->Solution->create();
			$this->request->data['Solution']['user_id']=$this->Auth->user('id');
			$this->request->data['Solution']['problem_id']=$id;
//debug($this->request->data);exit;
			if ($this->Problem->Solution->save($this->request->data)) {
				$this->Session->setFlash(__('Your solution has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your solution could not be saved. Please, try again.'));
			}
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Problem->create();
			$this->request->data['Problem']['user_id']=$this->Auth->user('id');
			if ($this->Problem->save($this->request->data)) {
				$this->Session->setFlash(__('The problem has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem could not be saved. Please, try again.'));
			}
		} else {
			//defaults
			$this->request->data['Problem']['category_id']=0;
		}
		$categories = $this->Problem->Category->find('list');
		$categories[0]='(none)';
		$users = $this->Problem->User->find('list');
		$this->set(compact('categories', 'users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Problem->id = $id;
		if (!$this->Problem->exists()) {
			throw new NotFoundException(__('Invalid problem'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Problem->save($this->request->data)) {
				$this->Session->setFlash(__('The problem has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Problem->read(null, $id);
		}
		$categories = $this->Problem->Category->find('list');
		$users = $this->Problem->User->find('list');
		$this->set(compact('categories', 'users'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Problem->id = $id;
		if (!$this->Problem->exists()) {
			throw new NotFoundException(__('Invalid problem'));
		}
		if ($this->Problem->delete()) {
			$this->Session->setFlash(__('Problem deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Problem was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
