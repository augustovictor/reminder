<?php  

	App::uses('AppController', 'Controller');

	class CategoriesController extends AppController {
		public $helpers = array('Html');



		public function index() {
			$this->set('categories', $this->Category->find('all'));
		}
		// End index

		public function view($id = null) {
			if(!$id) {
				throw new NotFoundException(__('Invalid category.'));
			}

			$category = $this->Category->findById($id);
			if (!$category) {
				throw new NotFoundException(__('Invalid category.'));
			}

			$this->set('category', $category);

		}
		// End view

		public function add() {
			if ($this->request->is('post')) {
				$this->Category->create();
				if ($this->Category->save($this->request->data)) {
					$this->Session->setFlash(__('Your category has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}

				return $this->Session->setFlash(__('Unable to add your category.'));
			}
		}
		// End add

		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid category.'));
			}

			$category = $this->Category->findById($id);
			if (!$category) {
				throw new NotFoundException(__('Invalid category.'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Category->id = $id;
				if ($this->Category->save($this->request->data)) {
					$this->Session->setFlash(__('Your category has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}

				return $this->Session->setFlash(__('Unable to save your category.'));
			}

			if (!$this->request->data) {
				$this->request->data = $category;
			}

		}
		// End edit

		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Category->delete($id)) {
				$this->Session->setFlash(__('The category id: %s has been deleted.', h($id)));
				return $this->redirect(array('action' => 'index'));
			}

		}
		// End delete
	}
	// End CategoriesController

?>