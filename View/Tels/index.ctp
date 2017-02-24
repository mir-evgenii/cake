<h2>Телефон</h2>

<?php echo $this->element('menu') ?>

<div class="content1">
<?php if(is_array($tels)) : ?>
<table>
<tr>
<th>Id</th>
<th>Тариф</th>
<th>Счет</th>
<th>Чек</th>
<th>Действия</th>
</tr>
<?php foreach ($tels as $tel) : ?>
<tr>
<td><?= $tel['Tel']['id'] ?></td>
<td><?= $tel['Tel']['tariff'] ?></td>
<td><?= $tel['Tel']['bill'] ?></td>
<td><?= $tel['Tel']['chek'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $tel['Tel']['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $tels; ?>
<?php endif; ?>
</div>