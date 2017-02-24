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
		$this->set('role', 'Пользователь'); 
		$this->set('nets', $this->Net->find('all'));
		//$nets = $this->Net->find('all');
		//debug($nets);
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