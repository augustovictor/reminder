<?php  

	App::uses('AppModel', 'Model');

	class Category extends AppModel {
		public $validate = array(
			'title' => array('rule' => 'notEmpty'),
			'description' => array('rule' => 'notEmpty')
			);
	}
	// End Category

?>