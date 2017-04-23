<h2>IP TV</h2>

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