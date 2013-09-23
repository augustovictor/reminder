<?php  

	App::uses('AppModel', 'Model');

	class Antivirus extends AppModel {
		public $useTable = 'antivirus';

		public $belongsTo = 'User';
	}
	// End Antivirus

?>