<?php
	class UsersController extends AppController {
		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('add', 'logout');
		}
		
	 	public function index() {
	 		
	 	}
		
		public function view($userId = null) {
	        $this->User->userid = $userId;
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
	        $this->set('user', $this->User->read(null, $userId));
	    }
	
	    public function add() {
	        if ($this->request->is('post')) {
	            $this->User->create();
	            if ($this->User->save($this->request->data)) {
	                $this->Session->setFlash(__('The user has been saved'));
	                $this->redirect(array('action' => 'index'));
	            } else {
	                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	            }
	        }
	    }
	
	    public function edit($userId = null) {
	        $this->User->userid = $userId;
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
	        if ($this->request->is('post') || $this->request->is('put')) {
	            if ($this->User->save($this->request->data)) {
	                $this->Session->setFlash(__('The user has been saved'));
	                $this->redirect(array('action' => 'index'));
	            } else {
	                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	            }
	        } else {
	            $this->request->data = $this->User->read(null, $id);
	            unset($this->request->data['User']['password']);
	        }
	    }
	
	    public function delete($userId) {
	        if (!$this->request->is('post')) {
	            throw new MethodNotAllowedException();
	        }
	        $this->User->userid = $id;
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
	        if ($this->User->delete()) {
	            $this->Session->setFlash(__('User deleted'));
	            $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('User was not deleted'));
	        $this->redirect(array('action' => 'index'));
	    }
		public function restore($userId)
		{
			
		}
		
		public function login() {
		    if ($this->request->is('post')) {
		        if ($this->Auth->login()) {
		            $this->redirect($this->Auth->redirect());
		        } else {
		            $this->Session->setFlash(__('Invalid username or password, try again'));
		        }
		    }
		}
		
		public function logout() {
		    $this->redirect($this->Auth->logout());
		}
	}
?>