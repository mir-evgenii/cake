<div class="content1">
<?php if(is_array($nets)) : ?>

<table>
<tr>
<th>Id</th>
<th>Имя</th>
<th>Тариф</th>
<th>Счет</th>
<th>Чек</th>
<th>Действия</th>
</tr>
<?php foreach ($nets as $net) : ?>
<tr>
<td><?= $net['id'] ?></td>
<td><?= $net['username'] ?></td>
<td><?= $net['tariff'] ?></td>
<td><?= $net['bill'] ?></td>
<td><?= $net['chek'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $net['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $nets; ?>
<?php endif; ?>
</div>