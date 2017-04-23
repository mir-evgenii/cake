<?php if($logged_user): ?>
 <p>Добро пожаловать, <?php echo $logged_user['username'] ?></p>
 <p><?php echo $this->Html->link('Выход', '/users/logout') ?></p>
<?php else: ?>
 <p><?php echo $this->Html->link('Вход', '/users/login') ?></p>
<?php endif; ?>

<?php 
if($logged_user['role'] === 'user'){
		include 'user_menu.ctp';
		}

if($logged_user['role'] === 'admin'){
		include 'admin_menu.ctp';
		}

if($logged_user['role'] === 'thec'){
		include 'thec_menu.ctp';
		}

if($logged_user['role'] === 'account'){
		include 'account_menu.ctp';
		}
		return false;
 ?>
