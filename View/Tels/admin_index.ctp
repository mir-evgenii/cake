<div class="content1">

<?php if(is_array($tels)) : ?>

<table>
<tr>
<th>Id</th>
<th>Имя</th>
<th>Телефон</th>
<th>Адрес</th>
<th>Тариф</th>
<th>Счет</th>
<th>Чек</th>
<th>Действия</th>
</tr>
<?php foreach ($tels as $tel) : ?>
<tr>
<td><?= $tel['id'] ?></td>
<td><?= $tel['username'] ?></td>
<td><?= $tel['phone'] ?></td>
<td><?= $tel['address'] ?></td>
<td><?= $tel['tariff'] ?></td>
<td><?= $tel['bill'] ?></td>
<td><?= $tel['chek'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $tel['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $tels; ?>
<?php endif; ?>
</div>