<?php
/**
* 
*/
class NetsController extends AppController
{
	public $components = array('Paginator');

	public $paginate1 = array(
        'limit' => 10,
        'order' => array(
            'Net.id' => 'asc'
        )
    );

    public $paginate2 = array(
        'limit' => 10,
        'conditions' => array('role' => 'user'),
        'order' => array(
            'Net.id' => 'asc'
        )
    );

	public $uses = ['Net', 'User'];

	public function isAuthorized($user = null){
		if($this->action === 'edit' && $user['role'] === 'user'){
			return true;
		}
		return parent::isAuthorized($user);
	}
	
	public function index($search = null)
	{
		$user=$this->Auth->user();
		
		if($user['role'] === 'user'){
			$this->set('nets', $this->Net->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		}
		if($user['role'] === 'admin'){
		if (isset($search)){
			$search1 = $search.'%';
			$this->Paginator->settings = $this->paginate2;
			$user_arr =$this->Paginator->paginate('User', array('User.fio LIKE' => $search1));
			$this->Paginator->settings = $this->paginate1;
		    $net_arr = $this->Paginator->paginate('Net', array('Net.id LIKE' => $user_arr[0]['User']['id']));
		}else{
			$this->Paginator->settings = $this->paginate1;
		    $net_arr = $this->Paginator->paginate('Net');
		    $this->Paginator->settings = $this->paginate2;
		    $user_arr = $this->Paginator->paginate('User');
		}
			$result = count($user_arr);
			$nets_users = array();
			for ($nom = 0; $nom < $result; array_push($nets_users, $net_user), $nom++) {
				$net_user=($net_arr[$nom]['Net'])+($user_arr[$nom]['User']);
			}
			$this->set('nets', $nets_users);
		}
		if($user['role'] === 'account'){
		if (isset($search)){
			$search1 = $search.'%';
			$this->Paginator->settings = $this->paginate2;
			$user_arr =$this->Paginator->paginate('User', array('User.fio LIKE' => $search1));
			$this->Paginator->settings = $this->paginate1;
		    $net_arr = $this->Paginator->paginate('Net', array('Net.id LIKE' => $user_arr[0]['User']['id']));
		}else{
			$this->Paginator->settings = $this->paginate1;
		    $net_arr = $this->Paginator->paginate('Net');
		    $this->Paginator->settings = $this->paginate2;
		    $user_arr = $this->Paginator->paginate('User');
		}
			$result = count($user_arr);
			$nets_users = array();
			for ($nom = 0; $nom < $result; array_push($nets_users, $net_user), $nom++) {
				/*$net_user = array_merge($net_arr[$nom]['Net'], $user_arr[$nom]['User']);*/
				$net_user=($net_arr[$nom]['Net'])+($user_arr[$nom]['User']);
			}
			/*$nets_users1 = array_diff($nets_users, array(''));*/
			$this->set('nets', $nets_users);
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

	public function stat (){
		$user=$this->Auth->user();
		
		if($user['role'] === 'admin'){
			/*$this->set('stat390', $this->Net->find('all', array('conditions' => array('tariff' => 'iFlat 390'))));
			$this->set('stat490', $this->Net->find('all', array('conditions' => array('tariff' => 'iFlat 490'))));
			$this->set('stat590', $this->Net->find('all', array('conditions' => array('tariff' => 'iFlat 590'))));
			$this->set('stat690', $this->Net->find('all', array('conditions' => array('tariff' => 'iFlat 690'))));
			$this->set('stat790', $this->Net->find('all', array('conditions' => array('tariff' => 'iFlat 590'))));
			$this->set('stat_null', $this->Net->find('all', array('conditions' => array('tariff' => 'Отключен'))));*/

			$stat_arr = ['iFlat 390', 'iFlat 490', 'iFlat 590', 'iFlat 690', 'iFlat 790','Отключен'];
			$result = count($stat_arr);
			$stats = array();
			$bill_sum = array();

			for ($nom = 0; $nom < $result; array_push($stats, $stat), array_push($bill_sum, $bill), $nom++) {	
				$stat = array();
				$stat = $this->Net->find('all', array('conditions' => array('tariff' => $stat_arr[$nom])));
				$bill = array();
				$bill = $this->Net->find('all', array('conditions' => array('tariff' => $stat_arr[$nom]), 'fields' => array('sum(Net.bill) AS bill_sum')));

			}
			/*debug($stats);*/
			/*$this->set('stats', $stats);*/
			
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
		if (!$this->Net->exists($id)) {
			throw new NotFoundException(__('Такого пользователя нет!'));
		}
		$this->set('nets', $this->Net->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		$this->set('user', $this->User->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
	}
}

?>