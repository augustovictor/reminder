<?php  

	App::uses('AppController', 'Controller');

	class PmsController extends AppController {
		public $name = 'Pm';
		public $helpers = array('Html');


		public function index() {
			$order = 'date asc';
			$current_user_id = $this->Auth->user('id');
			$current_user_role = $this->Auth->user('role');

			if($current_user_role === 'customer') {
				$this->set('toDoPm', $this->Pm->find('all', 
						array(
							'order' => $order,
							'conditions' => array(
								'user_id' => $current_user_id, 
								'done' => '0'
								) //End conditions
						) //End array
					) //End find
				); // End set

				$this->set('closedPm', $this->Pm->find('all', 
					array('order' => $order, 'conditions' => array(
								'user_id' => $current_user_id, 
								'done' => '1'
							) //End conditions
						) //End array
					) //End find
				);//End set
			}
			// End if customer

			if ($current_user_role === 'admin') {
				$this->set('toDoPm', $this->Pm->find('all', 
						array(
							'order' => $order,
							'conditions' => array(
								'done' => '0'
								) //End conditions
						) //End array
					) //End find
				); // End set

				$this->set('closedPm', $this->Pm->find('all', 
					array('order' => $order, 'conditions' => array(
								'done' => '1'
							) //End conditions
						) //End array
					) //End find
				);//End set
			}
			// End if current_user_role
		}
		// End index

		public function add() {

			$this->set('users', $this->Pm->User->find('list', array('order' => 'username')));

			if ($this->request->is('post')) {
				if($this->Auth->user('role') !== 'admin') 
					$this->request->data['Pm']['user_id'] = $this->Auth->user('id');

				if ($this->Pm->save($this->request->data)) {
					$this->Session->setFlash(__('Your pm reminder has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your pm reminder.'));
			}
		}
		// End add

		public function edit($id = null) {

			$this->set('users', $this->Pm->User->find('list', array('order' => 'username')));

			if (!$id) {
				throw new NotFoundException(__('Invalid pm reminder.'));
			}

			$pm = $this->Pm->findById($id);
			if (!$pm) {
				throw new NotFoundException(__('Invalid pm reminder.'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Pm->id = $id;
				if ($this->Pm->save($this->request->data)) {
					$this->Session->setFlash(__('Your pm reminder has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update pm reminder.'));
			}

			if(!$this->request->data) {
				$this->request->data = $pm;
			}
		}
		// End edit

		public function delete($id) {
			if($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if($this->Pm->delete($id)) {
				$this->Session->setFlash(__('The pm reminder id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
		// End delete

		public function close($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$reminder = $this->Pm->findById($id);
			if (!$reminder) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$this->Pm->id = $id;
			$this->Pm->set('done', 1);
			if ($this->Pm->save($this->request->data)) {
				$this->Session->setFlash(__('Pm closed.'));
				return $this->redirect(array('action' => 'index'));
			}

		}
		// End close

		public function reopen($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$reminder = $this->Pm->findById($id);
			if (!$reminder) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$this->Pm->id = $id;
			$this->Pm->set('done', 0);
			if ($this->Pm->save($this->request->data)) {
				$this->Session->setFlash(__('Pm reopened.', 'default', array(), 'good'));
				return $this->redirect(array('action' => 'index'));
			}

		}
		// End reopen

	}
	// End PmsController

?>