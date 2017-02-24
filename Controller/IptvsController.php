<?php
/**
* 
*/
class IptvsController extends AppController
{
	
	public function index()
	{
		$user=$this->Auth->user();
		
		if($user['role'] === 'user'){
			$this->set('iptvs', $this->Iptv->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		}
		if($user['role'] === 'admin'){
			$this->set('iptvs', $this->Iptv->find('all'));
		}
		if($user['role'] === 'account'){
			$this->set('iptvs', $this->Iptv->find('all'));
		}
	}

	public function edit ($id = null){
		if (!$this->Iptv->exists($id)) {
			throw new NotFoundException(__('Такого пользователя нет!'));
		}
		$iptv = $this->Iptv->findById($id);
		//$this->set('categories', $this->Post->Category->find('list'));
		$this->set('iptv', $iptv);

		if ($this->request->is(['iptv', 'put'])) {
			if ($this->Iptv->save($this->request->data)) {
				$this->Session->setFlash('Настройки пользователя обновлены');
				return $this->redirect(['action' => 'index']);
			}
			$this->Session->setFlash('Ошибка обновления настроек пользователя');
		}

		if (!$this->request->data) {
			$this->request->data = $iptv;
		}
	}
}

?>