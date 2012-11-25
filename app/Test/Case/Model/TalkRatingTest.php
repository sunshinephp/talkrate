<?php
App::uses('TalkRating', 'Model');

/**
 * TalkRating Test Case
 *
 */
class TalkRatingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.talk_rating',
		'app.user',
		'app.talk'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TalkRating = ClassRegistry::init('TalkRating');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TalkRating);

		parent::tearDown();
	}

}
