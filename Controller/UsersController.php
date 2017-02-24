<?php
/**
* 
*/
class UsersController extends AppController
{

	public function isAuthorized($user = null){
		if($this->action === 'index' && $user['role'] === 'user'){
			return false;
		}
		if($this->action === 'add' && $user['role'] === 'user'){
			return false;
		}
		return parent::isAuthorized($user);
	}

	public function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow('add', 'logout', 'login');

	}

	public function index(){
		$this->set('users', $this->User->find('all'));
	}

	public function add(){
		if($this->request->is('post')){
			$this->User->create();
			if($this->User->save($this->request->data)){
				$this->Session->setFlash('Пользователь добавлен');
				$this->redirect('/');
			}else{
				$this->Session->setFlash('Ошибка регистрации!');
			}
		}
	}

	public function login(){
if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('Invalid username or password, try again'));
    }
	}
	
	public function logout(){
 return $this->redirect($this->Auth->logout());
	}

}
?>