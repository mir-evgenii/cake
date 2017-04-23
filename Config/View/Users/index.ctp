<h2>Список пользователей</h2> 

<?php echo $this->element('menu') ?>

<div class="content1">
<table>
<tr>
<th>Id</th>
<th>Имя</th>
<th>Адрес</th>
<th>Телефон</th>
<th>Роль</th>
<th>Действия</th>
</tr>
<?php foreach ($users as $user) : ?>
<tr>
<td><?= $user['User']['id'] ?></td>
<td><?= h($user['User']['username']) ?></td>
<td><?= $user['User']['address'] ?></td>
<td><?= $user['User']['phone'] ?></td>
<td><?= $user['User']['role'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $user['User']['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
</div>