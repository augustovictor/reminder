<?php  

	App::uses('AppModel', 'Model');

	class Battery extends AppModel {
		public $belongsTo = 'User';
		
		public $validate = array(
			'model' => array('rule' => 'notEmpty'),
			'expiry_date' => array('rule' => 'notEmpty'),
			'location' => array('rule' => 'notEmpty'),
			'replace_cost' => array('rule' => 'notEmpty')
			);
	}
	// End Battery

?>