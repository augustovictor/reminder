<?php  

	App::uses('AppModel', 'Model');

	class Pm extends AppModel {
		public $useTable = 'pms';

		public $belongsTo = 'User';

		public $validate = array(
			'date' => array('rule' => 'notEmpty'),
			'location' => array('rule' => 'notEmpty')
			);
	}
	// End Battery

?>