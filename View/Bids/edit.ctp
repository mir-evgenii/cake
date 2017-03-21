<h2>Изменение заявки</h2>

<?php
if($logged_user['role'] === 'user'){
	include 'user_edit.ctp';
}
if($logged_user['role'] === 'admin'){
	include 'admin_edit.ctp';
}
if($logged_user['role'] === 'thec'){
	include 'thec_edit.ctp';
}

?>