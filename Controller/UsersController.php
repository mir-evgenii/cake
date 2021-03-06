<?php
/**
* 
*/
class UsersController extends AppController
{
	public $components = array('Paginator');

    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'User.id' => 'asc'
        )
    );


	public $uses = ['Net', 'Tel', 'Video', 'Iptv', 'User'];

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

	public function index($search = null){
		/*$this->set('users', $this->User->find('all'));*/
		/*$search = 'А';*/
		if (isset($search)){
			$search1 = $search.'%';
			$data = $this->Paginator->paginate('User', array('User.fio LIKE' => $search1));
		}else{
			$this->Paginator->settings = $this->paginate;
			$data = $this->Paginator->paginate('User');
		}
		
		/*$this->Paginator->settings = $this->paginate;
		$data = $this->Paginator->paginate('User');*/
		$this->set('users', $data);


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

	public function edit ($id = null){
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Такого пользователя нет!'));
		}
		$user = $this->User->findById($id);
		//$this->set('categories', $this->Post->Category->find('list'));
		$this->set('user', $user);

		if ($this->request->is(['user', 'put'])) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Настройки пользователя обновлены');
				return $this->redirect(['action' => 'index']);
			}
			$this->Session->setFlash('Ошибка обновления настроек пользователя');
		}

		if (!$this->request->data) {
			$this->request->data = $user;
		}
	}

}
?>