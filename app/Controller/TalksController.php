<?php
App::uses('AppController', 'Controller');
/**
 * Talks Controller
 *
 * @property Talk $Talk
 */
class TalksController extends AppController {

	public $components = array('Paginator');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Talk->recursive = 0;
		$this->Paginator->settings = array(
			'Talk' => array(
				'limit' => 300,
				'fields' => array('Talk.*', 'TalkRating.rating'),
				'joins' => array(
					array(
						'table' => 'talk_ratings',
						'alias' => 'TalkRating',
						'type' => 'LEFT',
						'conditions' => array('TalkRating.talk_id = Talk.id', 'TalkRating.user_id' => $this->Auth->user('id')
						)
					)
				)
			)

		);
		$talks = $this->Paginator->paginate();

		$this->set('talks', $talks);
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
				$this->Session->setFlash(__('The talk could not be saved. Please, correct the errors below and try again.'));
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
		$talk = $this->Talk->find('first', array(
			'fields' => array('Talk.*', 'TalkRating.rating'),
			'joins' => array(
				array(
					'table' => 'talk_ratings',
					'alias' => 'TalkRating',
					'type' => 'LEFT',
					'conditions' => array('TalkRating.talk_id = Talk.id', 'TalkRating.user_id' => $this->Auth->user('id')
					)
				),
			),
			'conditions' => array('Talk.id' => $id)
		));
		$neighbors = $this->Talk->find('neighbors', array('fields' => array('id', 'name'), 'recursive' => -1));
		$this->set('talk', $talk);
		$this->set('neighbors', $neighbors);
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
				$this->Session->setFlash(__('The talk could not be saved. Please correct the errors below and try again.'));
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

	public function upload() {
		if ($this->request->is('post')) {

			try {
				$this->Talk->saveCsv($this->request->data['Talk']['csv']['tmp_name']);
				$this->Session->setFlash('Talks imported successfully');
				return $this->redirect('/');
			} catch (Exception $ex) {
				$this->Session->setFlash('Errors encountered importing talks: ' . $ex->getMessage());
			}
		}
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
