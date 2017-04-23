<?php
/**
* 
*/
class IptvsController extends AppController
{
	public $uses = ['Iptv', 'User'];
	
	public function index()
	{
		$user=$this->Auth->user();
		
		if($user['role'] === 'user'){
			$this->set('iptvs', $this->Iptv->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		}
		if($user['role'] === 'admin'){
			/*$this->set('iptvs', $this->Iptv->find('all'));*/

			$iptv_arr=($this->Iptv->find('all'));
			$user_arr=($this->User->find('all',  array('conditions' => array('role' => 'user'))));
			$result = count($user_arr);
			$iptvs_users = array();
			for ($nom = 0; $nom < $result; array_push($iptvs_users, $iptv_user), $nom++) {
				/*$net_user = array_merge($net_arr[$nom]['Net'], $user_arr[$nom]['User']);*/
				$iptv_user=($iptv_arr[$nom]['Iptv'])+($user_arr[$nom]['User']);
			}
			/*$iptvs_users1 = array_diff($iptvs_users, array(''));*/
			$this->set('iptvs', $iptvs_users);
		}
		if($user['role'] === 'account'){
			/*$this->set('iptvs', $this->Iptv->find('all'));*/

			$iptv_arr=($this->Iptv->find('all'));
			$user_arr=($this->User->find('all',  array('conditions' => array('role' => 'user'))));
			$result = count($user_arr);
			$iptvs_users = array();
			for ($nom = 0; $nom < $result; array_push($iptvs_users, $iptv_user), $nom++) {
				/*$net_user = array_merge($net_arr[$nom]['Net'], $user_arr[$nom]['User']);*/
				$iptv_user=($iptv_arr[$nom]['Iptv'])+($user_arr[$nom]['User']);
			}
			/*$iptvs_users1 = array_diff($iptvs_users, array(''));*/
			$this->set('iptvs', $iptvs_users);
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

	public function stat (){
		$user=$this->Auth->user();
		
		if($user['role'] === 'admin'){
			
			$stat_arr = ['Промо', 'Базовый', 'Супербазовый', 'Отключен'];
			$result = count($stat_arr);
			$stats = array();
			$bill_sum = array();

			for ($nom = 0; $nom < $result; array_push($stats, $stat), array_push($bill_sum, $bill), $nom++) {	
				$stat = array();
				$stat = $this->Iptv->find('all', array('conditions' => array('tariff' => $stat_arr[$nom])));
				$bill = array();
				$bill = $this->Iptv->find('all', array('conditions' => array('tariff' => $stat_arr[$nom]), 'fields' => array('sum(Iptv.bill) AS bill_sum')));
			}
			
			$result_arr = array();
			foreach ($stats as $stat){
				$result = count($stat);
				array_push($result_arr, $result);
			}
			
			$this->set('stats', $result_arr);
			$this->set('bill', $bill_sum);

		}
	}

	public function pay ($id = null){
		if (!$this->Iptv->exists($id)) {
			throw new NotFoundException(__('Такого пользователя нет!'));
		}
		$this->set('iptvs', $this->Iptv->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		$this->set('user', $this->User->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
	}
}

?>