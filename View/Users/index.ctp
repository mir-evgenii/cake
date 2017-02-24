<h2>Список пользователей</h2> 

<?php echo $this->element('menu') ?>

<div class="content1">
<table>
<tr>
<th>Id</th>
<th>Логин</th>
<th>Пароль</th>
<th>Роль</th>
</tr>
<?php foreach ($users as $user) : ?>
<tr>
<td><?= $user['User']['id'] ?></td>
<td><?= h($user['User']['username']) ?></td>
<td><?= $user['User']['password'] ?></td>
<td><?= $user['User']['role'] ?></td>
</tr>
<?php endforeach;?>
</table>
</div>