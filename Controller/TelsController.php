<?php
/**
* 
*/
class TelsController extends AppController
{
	public $components = array('Paginator');

	public $paginate1 = array(
        'limit' => 1,
        'order' => array(
            'Net.id' => 'asc'
        )
    );

    public $paginate2 = array(
        'limit' => 1,
        'conditions' => array('role' => 'user'),
        'order' => array(
            'Net.id' => 'asc'
        )
    );

	public $uses = ['Tel', 'User'];
	
	public function index($search = null)
	{
		$user=$this->Auth->user();
		
		if($user['role'] === 'user'){
			$this->set('tels', $this->Tel->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		}
		if($user['role'] === 'admin'){
		if (isset($search)){
			$search1 = $search.'%';
			$this->Paginator->settings = $this->paginate2;
			$user_arr =$this->Paginator->paginate('User', array('User.fio LIKE' => $search1));
			$this->Paginator->settings = $this->paginate1;
		    $tel_arr = $this->Paginator->paginate('Tel', array('Tel.id LIKE' => $user_arr[0]['User']['id']));
		}else{
			$this->Paginator->settings = $this->paginate1;
		    $tel_arr = $this->Paginator->paginate('Tel');
			$this->Paginator->settings = $this->paginate2;
		    $user_arr = $this->Paginator->paginate('User');
		}
			$result = count($user_arr);
			$tels_users = array();
			for ($nom = 0; $nom < $result; array_push($tels_users, $tel_user), $nom++) {
				/*$net_user = array_merge($net_arr[$nom]['Net'], $user_arr[$nom]['User']);*/
				$tel_user=($tel_arr[$nom]['Tel'])+($user_arr[$nom]['User']);
			}
			/*$tels_users1 = array_diff($tels_users, array(''));*/
			$this->set('tels', $tels_users);
		}
		if($user['role'] === 'account'){
		if (isset($search)){
			$search1 = $search.'%';
			$this->Paginator->settings = $this->paginate2;
			$user_arr =$this->Paginator->paginate('User', array('User.fio LIKE' => $search1));
			$this->Paginator->settings = $this->paginate1;
		    $tel_arr = $this->Paginator->paginate('Tel', array('Tel.id LIKE' => $user_arr[0]['User']['id']));
		}else{
			$this->Paginator->settings = $this->paginate1;
		    $tel_arr = $this->Paginator->paginate('Tel');
			$this->Paginator->settings = $this->paginate2;
		    $user_arr = $this->Paginator->paginate('User');
		}
			$result = count($user_arr);
			$tels_users = array();
			for ($nom = 0; $nom < $result; array_push($tels_users, $tel_user), $nom++) {
				/*$net_user = array_merge($net_arr[$nom]['Net'], $user_arr[$nom]['User']);*/
				$tel_user=($tel_arr[$nom]['Tel'])+($user_arr[$nom]['User']);
			}
			/*$tels_users1 = array_diff($tels_users, array(''));*/
			$this->set('tels', $tels_users);
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

	public function stat (){
		$user=$this->Auth->user();
		
		if($user['role'] === 'admin'){
			
			$stat_arr = ['Безлимитный', 'Комбинированный', 'Повременный', 'Отключен'];
			$result = count($stat_arr);
			$stats = array();
			$bill_sum = array();

			for ($nom = 0; $nom < $result; array_push($stats, $stat), array_push($bill_sum, $bill), $nom++) {	
				$stat = array();
				$stat = $this->Tel->find('all', array('conditions' => array('tariff' => $stat_arr[$nom])));
				$bill = array();
				$bill = $this->Tel->find('all', array('conditions' => array('tariff' => $stat_arr[$nom]), 'fields' => array('sum(Tel.bill) AS bill_sum')));
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
		if (!$this->Tel->exists($id)) {
			throw new NotFoundException(__('Такого пользователя нет!'));
		}
		$this->set('tels', $this->Tel->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		$this->set('user', $this->User->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
	}
}
?>