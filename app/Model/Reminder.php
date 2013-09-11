<?php  

	App::uses('AppModel', 'Model');

	class Reminder extends AppModel {
		public $validate = array(
			'title' => array('rule' => 'notEmpty'),
			'description' => array('rule' => 'notEmpty'),
			'date' => array('rule' => 'notEmpty')
		);
	}
	// End Reminder

?>