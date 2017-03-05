<h2>Изменение настроек пользователя</h2>

<div>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username', ['label' => 'Имя']);
echo $this->Form->input('password', ['label' => 'Пароль']);
echo $this->Form->input('role', ['label' => 'Роль', 'options' => ['user' => 'Пользователь', 'admin' => 'Администратор', 'thec' => 'Техник', 'account' => 'Бухгалтер']]);
echo $this->Form->input('address', ['label' => 'Адрес']);
echo $this->Form->input('phone', ['label' => 'Телефон']);
echo $this->Form->input('id');
echo $this->Form->end('Сохранить');
?>
</div>