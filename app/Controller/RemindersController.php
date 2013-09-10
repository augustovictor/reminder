<?php 

	App::uses('AppController', 'Controller');

	class RemindersController extends AppController {

		public $helpers = array('Html', 'Form');

		public function index() {
			$this->set('reminders', $this->Reminder->find('all'));
		}
		// End index

		public function view($id = Null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$reminder = $this->Reminder->findById($id);
			if (!$reminder) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$this->set('reminder', $reminder);
		}
		// End view

	}
	// End RemindersController

?>