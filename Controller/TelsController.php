<?php
/**
* 
*/
class TelsController extends AppController
{
	
	public function index()
	{
		$user=$this->Auth->user();
		
		if($user['role'] === 'user'){
			$this->set('tels', $this->Tel->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		}
		if($user['role'] === 'admin'){
			$this->set('tels', $this->Tel->find('all'));
		}
		if($user['role'] === 'account'){
			$this->set('tels', $this->Tel->find('all'));
		}
	}

	public function edit ($id = null){
		if (!$this->Tel->exists($id)) {
			throw new NotFoundException(__('Такого пользователя нет!'));
		}
		$tel = $this->Tel->findById($id);
		//$this->set('categories', $this->Post->Category->find('list'));
		$this->set('tel', $tel);

		if ($this->request->is(['tel', 'put'])) {
			if ($this->Tel->save($this->request->data)) {
				$this->Session->setFlash('Настройки пользователя обновлены');
				return $this->redirect(['action' => 'index']);
			}
			$this->Session->setFlash('Ошибка обновления настроек пользователя');
		}

		if (!$this->request->data) {
			$this->request->data = $tel;
		}
	}
}

?>