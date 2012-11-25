<?php
App::uses('AppController', 'Controller');
/**
 * TalkRatings Controller
 *
 * @property TalkRating $TalkRating
 * @property RequestHandlerComponent $RequestHandler
 */
class TalkRatingsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Ajax', 'Javascript');

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TalkRating->recursive = 0;
		$this->set('talkRatings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TalkRating->id = $id;
		if (!$this->TalkRating->exists()) {
			throw new NotFoundException(__('Invalid talk rating'));
		}
		$this->set('talkRating', $this->TalkRating->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TalkRating->create();
			if ($this->TalkRating->save($this->request->data)) {
				$this->Session->setFlash(__('The talk rating has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talk rating could not be saved. Please, try again.'));
			}
		}
		$users = $this->TalkRating->User->find('list');
		$talks = $this->TalkRating->Talk->find('list');
		$this->set(compact('users', 'talks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TalkRating->id = $id;
		if (!$this->TalkRating->exists()) {
			throw new NotFoundException(__('Invalid talk rating'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TalkRating->save($this->request->data)) {
				$this->Session->setFlash(__('The talk rating has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talk rating could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TalkRating->read(null, $id);
		}
		$users = $this->TalkRating->User->find('list');
		$talks = $this->TalkRating->Talk->find('list');
		$this->set(compact('users', 'talks'));
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
		$this->TalkRating->id = $id;
		if (!$this->TalkRating->exists()) {
			throw new NotFoundException(__('Invalid talk rating'));
		}
		if ($this->TalkRating->delete()) {
			$this->Session->setFlash(__('Talk rating deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Talk rating was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TalkRating->recursive = 0;
		$this->set('talkRatings', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->TalkRating->id = $id;
		if (!$this->TalkRating->exists()) {
			throw new NotFoundException(__('Invalid talk rating'));
		}
		$this->set('talkRating', $this->TalkRating->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TalkRating->create();
			if ($this->TalkRating->save($this->request->data)) {
				$this->Session->setFlash(__('The talk rating has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talk rating could not be saved. Please, try again.'));
			}
		}
		$users = $this->TalkRating->User->find('list');
		$talks = $this->TalkRating->Talk->find('list');
		$this->set(compact('users', 'talks'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->TalkRating->id = $id;
		if (!$this->TalkRating->exists()) {
			throw new NotFoundException(__('Invalid talk rating'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TalkRating->save($this->request->data)) {
				$this->Session->setFlash(__('The talk rating has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talk rating could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TalkRating->read(null, $id);
		}
		$users = $this->TalkRating->User->find('list');
		$talks = $this->TalkRating->Talk->find('list');
		$this->set(compact('users', 'talks'));
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
		$this->TalkRating->id = $id;
		if (!$this->TalkRating->exists()) {
			throw new NotFoundException(__('Invalid talk rating'));
		}
		if ($this->TalkRating->delete()) {
			$this->Session->setFlash(__('Talk rating deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Talk rating was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
