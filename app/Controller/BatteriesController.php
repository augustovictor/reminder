<?php  

	App::uses('AppController', 'Controller');

	class BatteriesController extends AppController {
		public $name = 'Battery';
		public $helpers = array('Html');
		var $components = array('Email', 'Paginator');

		public function isAuthorized($user) {
			if ($this->Auth->user('role') === 'basic')
				if(in_array($this->action, array())) // Enter here the basic user privileges
					return true;
				
			return parent::isAuthorized($user);
		}


		public function index() {
			$this->Battery->recursive = 0;			

			$order = 'expiry_date asc';
			$current_user_id = $this->Auth->user('id');
			$current_user_role = $this->Auth->user('role');

			if($current_user_role === 'customer' || $current_user_role === 'basic') {
				$this->Paginator->settings = array(
					'conditions' => array('done' => '0'),
					'limit' => 100000,
			        'order' => array('Battery.expiry_date' => 'asc'),
			        'user_id' => $current_user_id, 
				);
				$this->set('toDoBattery', $this->Paginator->paginate());

				

				$this->Paginator->settings = array(
					'conditions' => array('done' => '1'),
					'limit' => 100000,
			        'order' => array('Battery.expiry_date' => 'asc'),
			        'user_id' => $current_user_id, 
				);
				$this->set('closedDoBattery', $this->Paginator->paginate());
			}
			// End if customer

			if ($current_user_role === 'admin' || $current_user_role === 'basic') {
				$this->Paginator->settings = array(
					'conditions' => array('done' => '0'),
					'limit' => 100000,
			        'order' => array('Battery.expiry_date' => 'asc'),
				);
				$this->set('toDoBattery', $this->Paginator->paginate());

				

				$this->Paginator->settings = array(
					'conditions' => array('done' => '1'),
					'limit' => 100000,
			        'order' => array('Battery.expiry_date' => 'asc'),
				);
				$this->set('closedDoBattery', $this->Paginator->paginate());
			}
			// End if current_user_role
		}
		// End index

		public function add() {

			$this->set('users', $this->Battery->User->find('list', array('order' => 'username')));

			if ($this->request->is('post')) {
				if($this->Auth->user('role') !== 'admin') 
					$this->request->data['Battery']['user_id'] = $this->Auth->user('id');

				if ($this->Battery->save($this->request->data)) {
					$this->Session->setFlash(__('Your battery reminder has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your battery reminder.'));
			}
		}
		// End add

		public function edit($id = null) {

			$this->set('users', $this->Battery->User->find('list', array('order' => 'username')));

			if (!$id) {
				throw new NotFoundException(__('Invalid battery reminder.'));
			}

			$battery = $this->Battery->findById($id);
			if (!$battery) {
				throw new NotFoundException(__('Invalid battery reminder.'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Battery->id = $id;
				if ($this->Battery->save($this->request->data)) {
					$this->Session->setFlash(__('Your battery reminder has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update battery reminder.'));
			}

			if(!$this->request->data) {
				$this->request->data = $battery;
			}
		}
		// End edit

		public function delete($id) {
			if($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if($this->Battery->delete($id)) {
				$this->Session->setFlash(__('The battery reminder id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
		// End delete

		public function close($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$reminder = $this->Battery->findById($id);
			if (!$reminder) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$this->Battery->id = $id;
			$this->Battery->set('done', 1);
			if ($this->Battery->save($this->request->data)) {
				$this->Session->setFlash(__('Battery closed.'));
				return $this->redirect(array('action' => 'index'));
			}

		}
		// End close

		public function reopen($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$reminder = $this->Battery->findById($id);
			if (!$reminder) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$this->Battery->id = $id;
			$this->Battery->set('done', 0);
			if ($this->Battery->save($this->request->data)) {
				$this->Session->setFlash(__('Battery reopened.', 'default', array(), 'good'));
				return $this->redirect(array('action' => 'index'));
			}

		}
		// End reopen

	}
	// End BatteriesController

?>