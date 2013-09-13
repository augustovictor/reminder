<?php  

	// App::uses('AppModel', 'Model');
	App::uses('AuthComponent', 'Controller/Component');

	class User extends AppModel {
		public $validate = array(
	        'username' => array(
	            'required' => array(
	                'rule' => array('notEmpty'),
	                'message' => 'A username is required'
	            )
	        ),
	        'password' => array(
	            'required' => array(
	                'rule' => array('notEmpty'),
	                'message' => 'A password is required'
	            )
	        ),
	        'role' => array(
	            'valid' => array(
	                'rule' => array('inList', array('admin', 'customer')),
	                'message' => 'Please enter a valid role',
	                'allowEmpty' => false
	            )
	        )
	    );
	    // End validate

		public function beforeSave($options = array()) {
		    if (isset($this->data[$this->alias]['password'])) {
		        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		    }
		    return true;
		}

		public $hasMany = array(
			'Reminder' => array(
				'className' => 'Reminder',
				'foreignKey' => 'user_id',
	            'order' => 'Reminder.date DESC',
	            'dependent' => true
			)
		);

	}
	// End User

?>