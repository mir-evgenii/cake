<?php
/**
* 
*/
class TelsController extends AppController
{
	
	public function index()
	{
		$this->set('role', 'Пользователь'); 
		$this->set('tels', $this->Tel->find('all'));
		//$nets = $this->Net->find('all');
		//debug($nets);
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