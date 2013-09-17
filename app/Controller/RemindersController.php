<?php 

	App::uses('AppController', 'Controller');

	class RemindersController extends AppController {

		public $helpers = array('Html', 'Form', 'Session');
		public $components = array('Session');

		public function isAuthorized($user) {
		    // All registered users can add reminders
		    if ($this->action === 'add') {
		        return true;
		    }

		    // The owner of a reminder can edit and delete it
		    if (in_array($this->action, array('edit', 'delete'))) {
		        $reminderId = $this->request->params['pass'][0];
		        if ($this->Reminder->isOwnedBy($reminderId, $user['id'])) {
		            return true;
		        }
		    }

		    return parent::isAuthorized($user);
		}

		// $this->set('categories', $this->Category->find('list'));

		public function index() {
			// $this->set('reminders', $this->Reminder->find('all', array('order' => 'date desc')));
			$this->set('toDoReminders', $this->Reminder->find('all', 
					array(
						'order' => 'date asc',
						'conditions' => array(
							'user_id' => $this->Auth->user('id'), 
							'done' => '0'
							) //End conditions
					) //End array
				) //End find
			); // End set

			$this->set('closedReminders', $this->Reminder->find('all', 
				array('order' => 'date asc', 'conditions' => array(
							'user_id' => $this->Auth->user('id'), 
							'done' => '1'
						) //End conditions
					) //End array
				) //End find
			);//End set
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

			$this->loadModel('Category');

			$this->set('categories', $this->Category->find('list'));

			if ($this->request->is('post')) {
				// $this->Reminder->create();
				$this->request->data['Reminder']['user_id'] = $this->Auth->user('id');
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
		// End delete

		public function close($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$reminder = $this->Reminder->findById($id);
			if (!$reminder) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Reminder->id = $id;
				$this->Reminder->done = '1';
				if ($this->Reminder->save($this->request->data)) {
					$this->Session->setFlash(__('Reminder closed.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to close this reminder.'));
			}

			if(!$this->request->data) {
				$this->request->data = $reminder;
			}

		}

	}
	// End RemindersController

?>