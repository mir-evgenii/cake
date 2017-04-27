<h2>Регистрация</h2>

<?php echo $this->element('menu') ?>

<div class="content1">
<?php
echo $this->Form->create('User');
echo $this->Form->input('username', ['label' => 'Логин']);
echo $this->Form->input('password', ['label' => 'Пароль']);
echo $this->Form->input('role', ['label' => 'Роль', 'options' => ['user' => 'Пользователь', 'admin' => 'Администратор', 'thec' => 'Техник', 'account' => 'Бухгалтер']]);
echo $this->Form->input('fio', ['label' => 'Имя']);
echo $this->Form->input('address', ['label' => 'Адрес']);
echo $this->Form->input('phone', ['label' => 'Телефон']);
echo $this->Form->end('Сохранить');
?>
</div>