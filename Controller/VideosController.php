<?php
/**
* 
*/
class VideosController extends AppController
{
	
	public function index()
	{
		$user=$this->Auth->user();
		
		if($user['role'] === 'user'){
			$this->set('videos', $this->Video->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		}
		if($user['role'] === 'admin'){
			$this->set('videos', $this->Video->find('all'));
		}
		if($user['role'] === 'account'){
			$this->set('videos', $this->Video->find('all'));
		}
	}

	public function edit ($id = null){
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Такого пользователя нет!'));
		}
		$video = $this->Video->findById($id);
		//$this->set('categories', $this->Post->Category->find('list'));
		$this->set('video', $video);

		if ($this->request->is(['video', 'put'])) {
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash('Настройки пользователя обновлены');
				return $this->redirect(['action' => 'index']);
			}
			$this->Session->setFlash('Ошибка обновления настроек пользователя');
		}

		if (!$this->request->data) {
			$this->request->data = $video;
		}
	}
}

?>