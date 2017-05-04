<?php

class SearchsController extends AppController
{
	public $uses = ['Net', 'User', 'Tel', 'Video', 'Iptv'];

	public function index($search = null){
		$search = 'Ан';
		$this->set('users', $this->User->find('all', array('conditions' => array('fio' => $search))));
	}




}
?>