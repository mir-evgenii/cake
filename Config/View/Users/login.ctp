<h2>Авторизация</h2>

<div>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Войти');
?>
</div>