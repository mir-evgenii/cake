<h2>Заявки</h2> 

<?php echo $this->element('menu') ?>

<?php
if($logged_user['role'] === 'user'){
	include 'user_index.ctp';
}
if($logged_user['role'] === 'admin'){
	include 'admin_index.ctp';
}
if($logged_user['role'] === 'tech'){
	include 'tech_index.ctp';
}

?>