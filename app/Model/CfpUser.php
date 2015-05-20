<?php
App::uses('AppModel', 'Model');
/**
 * Talk Model
 *
 * @property TalkRating $TalkRating
 */
class CfpUser extends AppModel {
    
    public $useDbConfig = 'cfp';
//    public $table = 'users';
    public $useTable = 'users';

    public $virtualFields = array(
        'name' => "CONCAT(CfpUser.first_name, ' ', CfpUser.last_name)"
    );

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CfpTalk' => array(
			'className' => 'CfpTalk',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
