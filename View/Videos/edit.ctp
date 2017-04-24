<h2>Изменение настроек пользователя</h2>

<?php echo $this->element('menu') ?>

<?php
if($logged_user['role'] === 'user'){
		include 'user_edit.ctp';
		}

if($logged_user['role'] === 'admin'){
		include 'admin_edit.ctp';
		}

if($logged_user['role'] === 'account'){
		include 'account_edit.ctp';
		}
		return false;
?>
