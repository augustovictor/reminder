<?php  

	App::uses('AppModel', 'Model');

	class Antivirus extends AppModel {
		public $useTable = 'antivirus';

		public $belongsTo = 'User';

		public $validate = array(
			'av_expiry_date' => array('rule' => 'notEmpty'),
			'num_users' => array('rule' => 'notEmpty'),
			'renew_cost' => array('rule' => 'notEmpty'),
			'location' => array('rule' => 'notEmpty')
			);

	}
	// End Antivirus

?>