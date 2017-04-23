<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
	public $validate = [
	'username' => 'isUnique',
	'password' => 'notEmpty',
	'role' => ['rule' => ['inList', ['user', 'admin', 'thec', 'account']]]
	];
	
	public function beforeSave($options = array()) {
    if (isset($this->data['User']['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data['User']['password'] = $passwordHasher->hash(
            $this->data['User']['password']
        );
    }
    return true;
    }
}

?>