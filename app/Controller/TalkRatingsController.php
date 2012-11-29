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
	 * @throws Exception
	 * @return void
	 */
	public function add() {
		$results = array('success' => false, 'error' => '', 'msg' => '');

		try {
			if (!$this->request->is('post')) {
				throw new Exception('No data supplied');
			}
			$userId = $this->Auth->user('id');

			$exists = $this->TalkRating->find('first', array(
				'conditions' => array(
					'user_id' => $userId,
					'talk_id' => $this->request->data['talk_id']
				)
			));

			if (!$exists) {
				$this->TalkRating->create($this->request->data);
			} else {
				$this->TalkRating->set($exists);
			}

			$this->TalkRating->set('user_id', $userId);
			$this->TalkRating->set('rating', $this->request->data['rating']);

			$saved = $this->TalkRating->save();
			if (!$saved) {
				throw new Exception('The talk rating could not be saved. Please, try again.');
			}
			$results['msg'] = 'The talk rating has been saved';
			$results['success'] = true;

		} catch (Exception $ex) {
			$results['error'] = $ex->getMessage();
		}

		return new CakeResponse(array('type' => 'json', 'body' => json_encode($results)));
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
