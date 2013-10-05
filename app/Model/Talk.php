<?php
App::uses('AppModel', 'Model');
/**
 * Talk Model
 *
 * @property TalkRating $TalkRating
 */
class Talk extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a name for the talk',
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a first name for the presenter',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

		'last_name' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a valid last name for the presenter',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email address for the presenter',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'talk_level' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'talk_category' => array(
			//'alphaNumeric' => array(
				//'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'is_most_desired' => array(
			//'boolean' => array(
			//	'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
//		'slides' => array(
//			'url' => array(
//				'rule' => array('url'),
//				'message' => 'Please enter a valid url for the slides',
//				'allowEmpty' => true,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
		'is_sponsor' => array(
			//'boolean' => array(
				//'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'TalkRating' => array(
			'className' => 'TalkRating',
			'foreignKey' => 'talk_id',
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

	public function saveCsv($fileName = '') {
		$dataSource = $this->getDataSource();
		try {
			$dataSource->begin();
			if (($handle = fopen($fileName, "r")) !== FALSE) {
				$i = 0;
				while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$this->create(array(
							'created' => $row[0],
							'first_name' => $row[1],
							'last_name' => $row[2],
							'email' => $row[3],
							'bio' => $row[4],
							'location' => $row[5],
							'talk_level' => $row[6],
							'talk_category' => $row[7],
							'name' => $row[8],
							'abstract' => $row[9],
							'is_most_desired' => (boolean) $row[10],
							'other_info' => $row[11],
							'slides' => $row[12],
							'is_sponsor' => (boolean) $row[13],
						));
					if (!$this->validates()) {
						$errors = implode(', ', array_map(function($n) {
							return implode(', ', $n);
						}, $this->validationErrors));
						throw new Exception("Validation errors on row `{$i}`: " . $errors . ' ---- ' . implode(',', $row));
					}
					$saved = $this->save();
					if (!$saved) {
						throw new InternalErrorException("Row  `{$i}` failed to save");
					}
					$i++;
				}
				fclose($handle);
			}

			$dataSource->commit();
		} catch (Exception $ex) {
			$dataSource->rollback();
			throw $ex;
		}

		return true;
	}
    
    public function cfpImport($cfpUsers)
    {
        try {
            $failures = false;
            
            foreach ($cfpUsers as $cfpUser) {
                foreach ($cfpUser['CfpTalk'] as $cfpTalk) {
                    $this->create(array(
                            'created' => mysql_real_escape_string($cfpUser['CfpUser']['created_at']),
                            'first_name' => mysql_real_escape_string($cfpUser['CfpUser']['first_name']),
                            'last_name' => mysql_real_escape_string($cfpUser['CfpUser']['last_name']),
                            'email' => mysql_real_escape_string($cfpUser['CfpUser']['email']),
                            'bio' => mysql_real_escape_string((isset($cfpUser['CfpSpeaker']['bio']) ? $cfpUser['CfpSpeaker']['bio'] : '')),
                            'location' => mysql_real_escape_string((isset($cfpUser['CfpSpeaker']['info']) ? $cfpUser['CfpSpeaker']['info'] : '')),
                            'talk_level' => mysql_real_escape_string($cfpTalk['level']),
                            'talk_category' => mysql_real_escape_string($cfpTalk['category']),
                            'name' => mysql_real_escape_string($cfpTalk['title']),
                            'abstract' => mysql_real_escape_string($cfpTalk['description']),
                            'is_most_desired' => (boolean) mysql_real_escape_string($cfpTalk['desired']),
                            'other_info' => mysql_real_escape_string($cfpTalk['other']),
                            'slides' => mysql_real_escape_string($cfpTalk['slides']),
                            'is_sponsor' => (boolean) mysql_real_escape_string($cfpTalk['sponsor']),
                        ));

                    $saved = $this->save();

                    if (!$saved) {
                        $failures[] = "Talk Title =  `{$cfpTalk['title']}` failed to save<br />\n";
                    }
                }
            }
            
            if ($failures) {
                $output = '';
                
                foreach ($failures as $fails) {
                    $output .= $fails;
                }
                
                throw new InternalErrorException($output);
            }

        } catch (Exception $ex) {
            throw $ex;
        }

        return true;
    }
}
