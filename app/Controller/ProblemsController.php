<?php
App::uses('AppController', 'Controller');
/**
 * Problems Controller
 *
 * @property Problem $Problem
 */
class ProblemsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Problem->recursive = 0;
		$this->set('problems', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Problem->id = $id;
		if (!$this->Problem->exists()) {
			throw new NotFoundException(__('Invalid problem'));
		}
		$this->set('problem', $this->Problem->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Problem->create();
			if ($this->Problem->save($this->request->data)) {
				$this->Session->setFlash(__('The problem has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Problem->Category->find('list');
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
