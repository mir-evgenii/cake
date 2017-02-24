<?php
/**
* 
*/
class NetsController extends AppController
{
	public function isAuthorized($user = null){
		if($this->action === 'edit' && $user['role'] === 'user'){
			return false;
		}
		return parent::isAuthorized($user);
	}
	
	public function index()
	{
		$user=$this->Auth->user();
		
		if($user['role'] === 'user'){
			$this->set('nets', $this->Net->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		}
		if($user['role'] === 'admin'){
			$this->set('nets', $this->Net->find('all'));
		}
		if($user['role'] === 'account'){
			$this->set('nets', $this->Net->find('all'));
		}
		
	}

	public function edit ($id = null){
		if (!$this->Net->exists($id)) {
			throw new NotFoundException(__('Такого пользователя нет!'));
		}
		$net = $this->Net->findById($id);
		//$this->set('categories', $this->Post->Category->find('list'));
		$this->set('net', $net);

		if ($this->request->is(['net', 'put'])) {
			if ($this->Net->save($this->request->data)) {
				$this->Session->setFlash('Настройки пользователя обновлены');
				return $this->redirect(['action' => 'index']);
			}
			$this->Session->setFlash('Ошибка обновления настроек пользователя');
		}

		if (!$this->request->data) {
			$this->request->data = $net;
		}
	}
}

?>