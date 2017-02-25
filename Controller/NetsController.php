<?php
/**
* 
*/
class NetsController extends AppController
{
	public $uses = ['Net', 'User'];

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
			/*$this->set('nets', $this->Net->find('all'));
			$this->set('users', $this->User->find('all',  array('conditions' => array('role' => 'user'))));*/
			$net_arr=($this->Net->find('all'));
			$user_arr=($this->User->find('all',  array('conditions' => array('role' => 'user'))));
			$result = count($user_arr);
			$nets_users = array();
			for ($nom = 0; $nom <= $result; array_push($nets_users, $net_user), $nom++) {
				$net_user=($net_arr[$nom]['Net'])+($user_arr[$nom]['User']);
			}
			$nets_users1 = array_diff($nets_users, array(''));
			$this->set('nets', $nets_users1);
			/*$result = count($user_arr);
			debug($result);
			$nom=0;
			debug($net_arr[$nom]['Net']);
			debug($user_arr[$nom]['User']);

			$net_user=($net_arr[$nom]['Net'])+($user_arr[$nom]['User']);
			debug($net_user);*/

		}
		if($user['role'] === 'account'){
			$this->set('nets', $this->Net->find('all'));
			$this->set('users', $this->User->find('all',  array('conditions' => array('role' => 'user'))));
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