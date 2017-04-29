<?php
/**
* 
*/
class VideosController extends AppController
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

	public $uses = ['Video', 'User'];
	
	public function index()
	{
		$user=$this->Auth->user();
		
		if($user['role'] === 'user'){
			$this->set('videos', $this->Video->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		}
		if($user['role'] === 'admin'){
			/*$this->set('videos', $this->Video->find('all'));*/
			$this->Paginator->settings = $this->paginate1;
		    $video_arr = $this->Paginator->paginate('Video');
		    $this->Paginator->settings = $this->paginate2;
		    $user_arr = $this->Paginator->paginate('User');
			$result = count($user_arr);
			$videos_users = array();
			for ($nom = 0; $nom < $result; array_push($videos_users, $video_user), $nom++) {
				/*$net_user = array_merge($net_arr[$nom]['Net'], $user_arr[$nom]['User']);*/
				$video_user=($video_arr[$nom]['Video'])+($user_arr[$nom]['User']);
			}
			/*$videos_users1 = array_diff($videos_users, array(''));*/
			$this->set('videos', $videos_users);
		}
		if($user['role'] === 'account'){
			// $this->set('videos', $this->Video->find('all'));
			$this->Paginator->settings = $this->paginate1;
		    $video_arr = $this->Paginator->paginate('Video');
		    $this->Paginator->settings = $this->paginate2;
		    $user_arr = $this->Paginator->paginate('User');
			$result = count($user_arr);
			$videos_users = array();
			for ($nom = 0; $nom < $result; array_push($videos_users, $video_user), $nom++) {
				/*$net_user = array_merge($net_arr[$nom]['Net'], $user_arr[$nom]['User']);*/
				$video_user=($video_arr[$nom]['Video'])+($user_arr[$nom]['User']);
			}
			/*$videos_users1 = array_diff($videos_users, array(''));*/
			$this->set('videos', $videos_users);
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

	public function stat (){
		$user=$this->Auth->user();
		
		if($user['role'] === 'admin'){
			
			$stat_arr = ['360 руб/мес', 'Отключен'];
			$result = count($stat_arr);
			$stats = array();
			$bill_sum = array();

			for ($nom = 0; $nom < $result; array_push($stats, $stat), array_push($bill_sum, $bill), $nom++) {	
				$stat = array();
				$stat = $this->Video->find('all', array('conditions' => array('tariff' => $stat_arr[$nom])));
				$bill = array();
				$bill = $this->Video->find('all', array('conditions' => array('tariff' => $stat_arr[$nom]), 'fields' => array('sum(Video.bill) AS bill_sum')));
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
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Такого пользователя нет!'));
		}
		$this->set('videos', $this->Video->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
		$this->set('user', $this->User->find('all', array('conditions' => array('id' => $this->Auth->user('id')))));
	}
}

?>