<div class="actions">
<?php if($logged_user): ?>
 <p>Добро пожаловать, <?php echo $logged_user['username'] ?></p>
 <p><?php echo $this->Html->link('Выход', '/users/logout') ?></p>
<?php else: ?>
 <p><?php echo $this->Html->link('Вход', '/users/login') ?></p>
<?php endif; ?>


<ul>
<li><a href="/cake">Главная</a></li>
<li><?php echo $this->Html->link('Интернет', ['controller' => 'nets', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Телефон', ['controller' => 'tels', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Видеонаблюдение', ['controller' => 'videos', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('IP TV', ['controller' => 'iptvs', 'action' => 'index']) ?></li>



<?php 
if($logged_user['role'] === 'user'){
		return false;
		}else{
		echo '<li>'.$this->Html->link('Список пользователей', ['controller' => 'users', 'action' => 'index']).'</li>';
		}
 ?>


<?php 
if($logged_user['role'] === 'user'){
		return false;
		}else{
		echo '<li>'.$this->Html->link('Новый пользователь', ['controller' => 'users', 'action' => 'add']).'</li>';
		}
 ?>
</ul>
</div>