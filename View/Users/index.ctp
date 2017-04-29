<h2>Список пользователей</h2> 

<?php echo $this->element('menu') ?>

<div class="content1">
<table>
<tr>
<th><?php echo $this->Paginator->sort('id'); ?></th>
<th><?php echo $this->Paginator->sort('username', 'Логин'); ?></th>
<th><?php echo $this->Paginator->sort('fio', 'Имя'); ?></th>
<th><?php echo $this->Paginator->sort('address', 'Адрес'); ?></th>
<th><?php echo $this->Paginator->sort('phone', 'Телефон'); ?></th>
<th><?php echo $this->Paginator->sort('role', 'Роль'); ?></th>
<th>Действия</th>
</tr>
<?php foreach ($users as $user) : ?>
<tr>
<td><?= $user['User']['id'] ?></td>
<td><?= h($user['User']['username']) ?></td>
<td><?= $user['User']['fio'] ?></td>
<td><?= $user['User']['address'] ?></td>
<td><?= $user['User']['phone'] ?></td>
<td><?= $user['User']['role'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $user['User']['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<p>&nbsp;<?php echo $this->Paginator->numbers(); ?></p>
</div>