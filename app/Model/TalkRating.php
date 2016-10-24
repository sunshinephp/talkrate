<?php
App::uses('AppModel', 'Model');
/**
 * TalkRating Model
 *
 * @property User $User
 * @property Talk $Talk
 */
class TalkRating extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'talk_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rating' => array(
			'between' => array(
				'rule' => array('between', 1, 5),
				'message' => 'Please enter a rating between 1 and 5',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Talk' => array(
			'className' => 'Talk',
			'foreignKey' => 'talk_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function buildCsvFileForExport($path = '') {
	    if ($path != '') {
	        unlink($path);
        }
        
		$sql = "
			SELECT
				*
			FROM
				talk_ratings AS TalkRating
			INNER JOIN
				talks AS Talk ON Talk.id = TalkRating.talk_id
			LEFT JOIN
				users AS User ON User.id = TalkRating.user_id
			ORDER BY
				Talk.name ASC
		";
		$talks_and_ratings = $this->query($sql, false);

		$fp = fopen($path, 'w');

		fputcsv($fp, array('talk_name', 'speaker_name', 'type', 'rating', 'rated_by'));

		foreach ($talks_and_ratings as $talk_and_rating) {
			$fields = array(
				$talk_and_rating['Talk']['name'],
				$talk_and_rating['Talk']['first_name'] . ' ' . $talk_and_rating['Talk']['last_name'],
                $talk_and_rating['Talk']['talk_type'],
				$talk_and_rating['TalkRating']['rating'],
				$talk_and_rating['User']['email']
			);
			fputcsv($fp, $fields);
		}

		fclose($fp);

		return true;
	}
    
    public function buildCsvFileForExportAvg($path = '') {
        if ($path != '') {
            unlink($path);
        }
        
        $sql = "
			SELECT
				Talk.name, Talk.first_name, Talk.last_name, Talk.talk_type, AVG(TalkRating.rating) as average, User.email
			FROM
				talk_ratings AS TalkRating
			INNER JOIN
				talks AS Talk ON Talk.id = TalkRating.talk_id
			LEFT JOIN
				users AS User ON User.id = TalkRating.user_id
			GROUP BY
				TalkRating.talk_id
			ORDER BY
				Talk.talk_type, Talk.first_name, Talk.last_name, Talk.name ASC
		";
        $talks_and_ratings = $this->query($sql, false);
        
        $fp = fopen($path, 'w');
        
        fputcsv($fp, array('talk_name', 'speaker_name', 'type', 'avg_rating'));
        
        foreach ($talks_and_ratings as $talk_and_rating) {
            $fields = array(
                $talk_and_rating['Talk']['name'],
                $talk_and_rating['Talk']['first_name'] . ' ' . $talk_and_rating['Talk']['last_name'],
                $talk_and_rating['Talk']['talk_type'],
                round($talk_and_rating[0]['average'])
            );
            fputcsv($fp, $fields);
        }
        
        fclose($fp);
        
        return true;
    }
}
