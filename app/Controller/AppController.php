<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Auth' => array(
			'userModel' => 'User',
			'loginAction' => array(
				'controller' => 'users',
				'action' => 'login',
			),
			'authorize' => 'Controller',
			'authError' => 'Not authorized',
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email'),
					'scope' => array('User.is_approved' => 1)
				)
			)
		),
		'Session'
	);

	protected $registeredUserActions = array('index', 'view');

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function isAuthorized() {
		$is_admin = (boolean) $this->Auth->user('is_admin');

		if ($is_admin) {
			return true;
		}

		if (in_array($this->request->params['action'], $this->registeredUserActions)) {
			return true;
		}

		return false;
	}

	public function beforeRender() {
		$user = $this->Auth->user();
		$this->set('loggedInUser', $user);
		$this->set('isLoggedIn', $this->Auth->loggedIn());
		$this->set('isAdmin', isset($user['is_admin']) && $user['is_admin'] == '1' ? true : false );
	}
}
