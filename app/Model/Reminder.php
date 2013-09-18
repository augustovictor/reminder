<?php  

	App::uses('AppModel', 'Model');

	class Reminder extends AppModel {
		public $validate = array(
			'title' => array('rule' => 'notEmpty'),
			'description' => array('rule' => 'notEmpty'),
			'date' => array('rule' => 'notEmpty'),
			'category_id' => array('rule' => 'notEmpty')
		);

		public function isOwnedBy($reminder, $user) {
		    return $this->field('id', array('id' => $reminder, 'user_id' => $user)) === $reminder;
		}

		public $belongsTo = array('User', 'Category');

	}
	// End Reminder

?>