<?php 

	App::uses('AppController', 'Controller');

	class RemindersController extends AppController {

		public $helpers = array('Html', 'Form');
		public $components = array('Session');

		public function index() {
			$this->set('reminders', $this->Reminder->find('all'));
		}
		// End index

		public function view($id = null) {
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

		public function add() {
			if ($this->request->is('post')) {
				$this->Reminder->create();
				if ($this->Reminder->save($this->request->data)) {
					$this->Session->setFlash(__('Your reminder has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your reminder.'));
			}
		}
		// End add

		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$reminder = $this->Reminder->findById($id);
			if (!$reminder) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Reminder->id = $id;
				if ($this->Reminder->save($this->request->data)) {
					$this->Session->setFlash(__('Your reminder has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update reminder.'));
			}

			if(!$this->request->data) {
				$this->request->data = $reminder;
			}
		}
		// End edit

		public function delete($id) {
			if($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if($this->Reminder->delete($id)) {
				$this->Session->setFlash(__('The reminder id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}

	}
	// End RemindersController

?>