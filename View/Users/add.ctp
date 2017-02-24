<h2>Регистрация</h2>

<?php echo $this->element('menu') ?>

<div class="content1">
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('role', ['options' => ['user' => 'Пользователь', 'admin' => 'Администратор', 'thec' => 'Техник', 'account' => 'Бухгалтер']]);
echo $this->Form->end('Сохранить');
?>
</div>