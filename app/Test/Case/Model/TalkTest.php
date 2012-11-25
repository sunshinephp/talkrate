<?php
App::uses('Talk', 'Model');

/**
 * Talk Test Case
 *
 */
class TalkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.talk',
		'app.talk_rating',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Talk = ClassRegistry::init('Talk');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Talk);

		parent::tearDown();
	}

}
