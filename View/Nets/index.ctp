<h2>Интернет</h2>
<a href="/cake/nets/stat">Статистика</a>

<?php echo $this->element('menu') ?>

<?php
if($logged_user['role'] === 'user'){
	include 'user_index.ctp';
}
if($logged_user['role'] === 'admin'){
	include 'admin_index.ctp';
}
if($logged_user['role'] === 'account'){
	include 'account_index.ctp';
}

?>