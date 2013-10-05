<?php
App::uses('AppModel', 'Model');
/**
 * Talk Model
 *
 * @property TalkRating $TalkRating
 */
class CfpSpeaker extends AppModel {
    
    public $useDbConfig = 'cfp';
//    public $table = 'speakers';
    public $useTable = 'speakers';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_id';



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
