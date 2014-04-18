<?php  

	App::uses('AppController', 'Controller');
	App::uses('CakeEmail', 'Network/Email');

	class AntivirusController extends AppController {
		public $name = 'Antivirus';
		public $helpers = array('Html');
		var $components = array('Email', 'Paginator');

		public function isAuthorized($user) {
			if ($this->Auth->user('role') === 'basic')
				if(in_array($this->action, array('edit'))) // Enter here the basic user privileges
					return true;
				
			return parent::isAuthorized($user);
		}

		public function index() {
			// $this->Paginator->settings = $this->paginate;
			$this->Antivirus->recursive = 0;


			$order = 'av_expiry_date asc';
			$current_user_id = $this->Auth->user('id');
			$current_user_role = $this->Auth->user('role');

			if($current_user_role === 'customer' || $current_user_role == 'basic') {
				$this->Paginator->settings = array(
			        'conditions' => array('done' => '0'),
			        'limit' => 100000,
			        'order' => array('Antivirus.av_expiry_date' => 'asc'),
			        'user_id' => $current_user_id, 
			    );

				$this->set('toDoAntivirus', $this->Paginator->paginate());

				$this->Paginator->settings = array(
			        'conditions' => array('done' => '1'),
			        'limit' => 100000,
			        'order' => array('Antivirus.av_expiry_date' => 'asc'),
			        'user_id' => $current_user_id, 
			    );

				$this->set('closedAntivirus', $this->Paginator->paginate());
			}
			// End if customer

			if ($current_user_role === 'admin' || $current_user_role == 'basic') {
				$this->Paginator->settings = array(
			        'conditions' => array('done' => '0'),
			        'limit' => 100000,
			        'order' => array('Antivirus.av_expiry_date' => 'asc'),
			    );

				$this->set('toDoAntivirus', $this->Paginator->paginate());

				$this->Paginator->settings = array(
			        'conditions' => array('done' => '1'),
			        'limit' => 100000,
			        'order' => array('Antivirus.av_expiry_date' => 'asc'),
			    );

				$this->set('closedAntivirus', $this->Paginator->paginate());

			} // End if current_user_role

		}
		// End index

		public function add() {

			$this->set('users', $this->Antivirus->User->find('list', array('order' => 'username')));

			if ($this->request->is('post')) {
				if($this->Auth->user('role') !== 'admin') 
					$this->request->data['Antivirus']['user_id'] = $this->Auth->user('id');

				if ($this->Antivirus->save($this->request->data)) {
					$this->Session->setFlash(__('Your antivirus reminder has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your antivirus reminder.'));
			}
		}
		// End add

		public function edit($id = null) {

			$this->set('users', $this->Antivirus->User->find('list', array('order' => 'username')));

			if (!$id) {
				throw new NotFoundException(__('Invalid antivirus reminder.'));
			}

			$antivirus = $this->Antivirus->findById($id);
			if (!$antivirus) {
				throw new NotFoundException(__('Invalid antivirus reminder.'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Antivirus->id = $id;
				if ($this->Antivirus->save($this->request->data)) {
					$this->Session->setFlash(__('Your antivirus reminder has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update antivirus reminder.'));
			}

			if(!$this->request->data) {
				$this->request->data = $antivirus;
			}
		}
		// End edit

		public function delete($id) {
			if($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if($this->Antivirus->delete($id)) {
				$this->Session->setFlash(__('The antivirus reminder id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}
		}
		// End delete

		public function close($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$reminder = $this->Antivirus->findById($id);
			if (!$reminder) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$this->Antivirus->id = $id;
			$this->Antivirus->set('done', 1);
			if ($this->Antivirus->save($this->request->data)) {
				$this->Session->setFlash(__('Antivirus closed.'));
				return $this->redirect(array('action' => 'index'));
			}

		}
		// End close

		public function reopen($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$reminder = $this->Antivirus->findById($id);
			if (!$reminder) {
				throw new NotFoundException(__('Invalid reminder.'));
			}

			$this->Antivirus->id = $id;
			$this->Antivirus->set('done', 0);
			if ($this->Antivirus->save($this->request->data)) {
				$this->Session->setFlash(__('Antivirus reopened.', 'default', array(), 'good'));
				return $this->redirect(array('action' => 'index'));
			}

		}
		// End reopen

	}
	// End AntivirusController

?>