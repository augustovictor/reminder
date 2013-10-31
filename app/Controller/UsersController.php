<?php  

	App::uses('AppController', 'Controller');

	class UsersController extends AppController {

		public function beforeFilter() {
		    parent::beforeFilter();
		    $this->Auth->allow('add'); // Letting users register themselves
		}

		public function login() {
		    if ($this->request->is('post')) {
		        if ($this->Auth->login()) {
		            return $this->redirect($this->Auth->redirect(array('controller' => 'antivirus', 'action' => 'index')));
		        }
		        $this->Session->setFlash(__('Invalid username or password, try again'));
		    }
		}

		public function logout() {
		    return $this->redirect($this->Auth->logout());
		}

	    public function index() {
	        $this->set('users', $this->User->find('all', array('order' => 'username asc')));
	    }

	    public function view($id = null) {

	    	$this->loadModel('Antivirus');
	    	$this->loadModel('Battery');
	    	$this->loadModel('Pm');

			$current_user_role = $this->Auth->user('role');

	        $this->User->id = $id;
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
	        
	        $this->set('user', $this->User->read(null, $id));

	        //Antivius
	        $this->set('antivirus', $this->Antivirus->find(
		        	'all', array(
				        	'conditions' => array(
					        	'user_id' => $id
				        	)//End conditions
			        	)//End find array arguments
		        )//End find arguments
	        );

	        //Battery
	        $this->set('batteries', $this->Battery->find(
		        	'all', array(
				        	'conditions' => array(
					        	'user_id' => $id
				        	)//End conditions
			        	)//End find array arguments
		        )//End find arguments
	        );

	        //Pm
	        $this->set('pms', $this->Pm->find(
		        	'all', array(
				        	'conditions' => array(
					        	'user_id' => $id
				        	)//End conditions
			        	)//End find array arguments
		        )//End find arguments
	        );
	    }

	    public function add() {

	        if ($this->request->is('post')) {
	            $this->User->create();
	            if ($this->User->save($this->request->data)) {
	                $this->Session->setFlash(__('The user has been saved'));
	                return $this->redirect(array('controller' => 'reminders', 'action' => 'index'));
	            }
	            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	        }
	    }

	    public function edit($id = null) {
	        $this->User->id = $id;
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
	        if ($this->request->is('post') || $this->request->is('put')) {
	            if ($this->User->save($this->request->data)) {
	                $this->Session->setFlash(__('The user has been saved'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	        } else {
	            $this->request->data = $this->User->read(null, $id);
	            unset($this->request->data['User']['password']);
	        }
	    }

	    public function delete($id = null) {
	        if (!$this->request->is('post')) {
	            throw new MethodNotAllowedException();
	        }
	        $this->User->id = $id;
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
	        if ($this->User->delete()) {
	            $this->Session->setFlash(__('User deleted'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('User was not deleted'));
	        return $this->redirect(array('action' => 'index'));
	    }
	}
	// End UsersController

?>