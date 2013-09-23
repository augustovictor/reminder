<?php  

	App::uses('AppModel', 'Model');

	class Battery extends AppModel {
		public $belongsTo = 'User';
	}
	// End Battery

?>