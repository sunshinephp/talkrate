<?php
App::uses('AppController', 'Controller');
/**
 * Talks Controller
 *
 * @property Talk $Talk
 */
class TalksController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny();
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Talk->recursive = 0;
		$this->set('talks', $this->paginate());
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Talk->create();
			if ($this->Talk->save($this->request->data)) {
				$this->Session->setFlash(__('The talk has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talk could not be saved. Please, try again.'));
			}
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Talk->id = $id;
		if (!$this->Talk->exists()) {
			throw new NotFoundException(__('Invalid talk'));
		}
		$this->set('talk', $this->Talk->read(null, $id));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Talk->id = $id;
		if (!$this->Talk->exists()) {
			throw new NotFoundException(__('Invalid talk'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Talk->save($this->request->data)) {
				$this->Session->setFlash(__('The talk has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talk could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Talk->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Talk->id = $id;
		if (!$this->Talk->exists()) {
			throw new NotFoundException(__('Invalid talk'));
		}
		if ($this->Talk->delete()) {
			$this->Session->setFlash(__('Talk deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Talk was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Talk->recursive = 0;
		$this->set('talks', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Talk->id = $id;
		if (!$this->Talk->exists()) {
			throw new NotFoundException(__('Invalid talk'));
		}
		$this->set('talk', $this->Talk->read(null, $id));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Talk->id = $id;
		if (!$this->Talk->exists()) {
			throw new NotFoundException(__('Invalid talk'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Talk->save($this->request->data)) {
				$this->Session->setFlash(__('The talk has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talk could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Talk->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Talk->id = $id;
		if (!$this->Talk->exists()) {
			throw new NotFoundException(__('Invalid talk'));
		}
		if ($this->Talk->delete()) {
			$this->Session->setFlash(__('Talk deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Talk was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
