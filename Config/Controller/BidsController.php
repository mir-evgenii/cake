<?php
/**
* 
*/
class BidsController extends AppController
{
	public $uses = ['Bid', 'User'];

	/*public function isAuthorized($user = null){
		if($this->action === 'add'){
			return true;
		}
		return parent::isAuthorized($user);
	}*/

	public function isAuthorized($user  = null) {
    if ($this->action === 'add') {
        return true;
    }

    if (in_array($this->action, array('edit', 'delete'))) {
        $bidId = (int) $this->request->params['pass'][0];
        if ($this->Bid->isOwnedBy($bidId, $user['id'])) {
            return true;
        }


    }

    if (in_array($this->action, array('edit'))) {
        $user = ($this->Auth->user());
        if($user['role'] === 'thec') {
            return true;
        }
    }

    return parent::isAuthorized($user);
    }


	public function index() {

		/*$this->set('bids', $this->Bid->find('all'));*/

		$user = ($this->Auth->user());

		if($user['role'] === 'user'){
			$user_id=($this->Auth->user());
			$data = $this->Bid->find('all', array('conditions' => array('user_id' => $user_id['id'])));
			$this->set('bids', $data);

		}

		if($user['role'] === 'thec'){
			
			/*$data = $this->Bid->find('all', array('conditions' => array('status' => 'Не выполнено')));
			$this->set('bids', $data);*/

			$bid_arr=($this->Bid->find('all', array('conditions' => array('status' => 'Не выполнено'))));
			$user_arr=($this->User->find('all',  array('conditions' => array('role' => 'user'))));
			$result = count($user_arr);
			$bids_users = array();

			for ($nom = 0; $nom <= $result; array_push($bids_users, $bid_user), $nom++) {

				$user_id = $user_arr[$nom]['User']['id'];
				$bid_arr1=($this->Bid->find('all',  array('conditions' => array('user_id' => $user_id, 'status' => 'Не выполнено'))));
				$res = count($bid_arr1);

				$bid_user = $arrs;
				$arrs = array();

				for ($om = 0; $om < $res; array_push($arrs, $arr), $om++) {
					
				$arr=($user_arr[$nom]['User'])+($bid_arr1[$om]['Bid']);
				
				}
			}

			$new_arr = array_diff($bids_users, array('', NULL, null, false));
			$result = count($new_arr);

			for ($int = 1; $int <= $result; $int++) {
				foreach ($new_arr[$int] as $arr) { 
					array_push($arrs, $arr);
				}

			}

			$this->set('bids', $arrs);

		}

		if($user['role'] === 'admin'){
			
			$bid_arr=($this->Bid->find('all'));
			$user_arr=($this->User->find('all',  array('conditions' => array('role' => 'user'))));
			$result = count($user_arr);
			$bids_users = array();

			for ($nom = 0; $nom <= $result; array_push($bids_users, $bid_user), $nom++) {

				$user_id = $user_arr[$nom]['User']['id'];
				$bid_arr1=($this->Bid->find('all',  array('conditions' => array('user_id' => $user_id))));
				$res = count($bid_arr1);

				$bid_user = $arrs;
				$arrs = array();

				for ($om = 0; $om < $res; array_push($arrs, $arr), $om++) {
					
				$arr=($user_arr[$nom]['User'])+($bid_arr1[$om]['Bid']);
				
				}
			}

			$new_arr = array_diff($bids_users, array('', NULL, null, false));
			$result = count($new_arr);

			for ($int = 1; $int <= $result; $int++) {
				foreach ($new_arr[$int] as $arr) { 
					array_push($arrs, $arr);
				}

			}

			$this->set('bids', $arrs);

		}else{
			return false;
		}
		
	}

	public function view($id = null) {
		if (!$this->Bid->exists($id)) {
			throw new NotFoundException(__('Такой заявки нет!'));
		}
		$bid = $this->Bid->findById($id);
	
		$this->set('bid', $bid);

	}

	public function add() {
		if($this->request->is('post')){
			$this->Bid->create();
			$this->request->data['Bid']['user_id'] = $this->Auth->user('id');
			/*$this->set('user_id', $this->Auth->user());*/
			if($this->Bid->save($this->request->data)){
				$this->Session->setFlash('Заявка добавлена');// 'Заявка добавлена' не работает поскольку показывается после добавления статьи и тут же переадресовывает на гланую где это сообщение не выводится! Решение: нужно на JS сделать окошко с ОК и этим сообщением!
				$this->redirect('/bids');


			}else{
				$this->Session->setFlash('Ошибка добавления заявки!');
			}
		}
		/*$this->set('title_for_layout', 'Добавление статьи!');*/
		/*$this->set('categories', $this->Post->Category->find('list'));*/
	}

	public function delete($id = null){
		if (!$this->Bid->exists($id)) {
			throw new NotFoundException(__('Такой заявки нет!'));
		}
		if ($this->Bid->delete($id)) {
			/*$this->Session->setFlash('Статья удалена!', 'default', [], 'good');*/
			$this->Session->setFlash('Заявка удалена!', 'flash_ok');
		}else{
			$this->Session->setFlash('Ошибка удаления заявки!');
		}
		$this->redirect('/');
	}

	public function edit ($id = null){
		if (!$this->Bid->exists($id)) {
			throw new NotFoundException(__('Такой заявки нет!'));
		}
		$bid = $this->Bid->findById($id);
		/*$this->set('categories', $this->Post->Category->find('list'));*/
		$this->set('bid', $bid);

		if ($this->request->is(['post', 'put'])) {
			if ($this->Bid->save($this->request->data)) {
				$this->Session->setFlash('Заявка обновлена');
				return $this->redirect(['action' => 'index']);
			}
			$this->Session->setFlash('Ошибка обновления заявки!');
		}

		if (!$this->request->data) {
			$this->request->data = $bid;
		}
	}

	/*public function search($search = null){
		if (!$search) {
			$this->set('posts', 'Не введен поисковый запрос...');
		}
		$this->set('posts', $this->Post->find('all', [
			'conditions' => ['Post.title LIKE' => '%'.$search.'%']
			]));
		$this->render('index');
	}*/
}
?>