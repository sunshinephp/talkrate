<?php
App::uses('AppModel', 'Model');
/**
 * Talk Model
 *
 * @property TalkRating $TalkRating
 */
class CfpTalk extends AppModel {
    
    public $useDbConfig = 'cfp';
//    public $table = 'talks';
    public $useTable = 'talks';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
    public $belongsTo = array(
        'CfpUser' => array(
            'className' => 'CfpUser',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
