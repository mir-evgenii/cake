<div class="content1">
<?php if(is_array($nets)) : ?>

<table>
<tr>
<th>Тариф</th>
<th>Счет</th>
<th>Чек</th>
<th>Действия</th>
</tr>
<?php foreach ($nets as $net) : ?>
<tr>
<td><?= $net['Net']['tariff'] ?></td>
<td><?= $net['Net']['bill'] ?></td>
<td><?= $net['Net']['chek'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $net['Net']['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $nets; ?>
<?php endif; ?>
</div>