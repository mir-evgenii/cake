<div class="content1">

<?php if(is_array($videos)) : ?>

<table>
<tr>
<th><?php echo $this->Paginator->sort('id'); ?></th>
<th>Имя</th>
<th>Телефон</th>
<th>Адрес</th>
<th>Тариф</th>
<th>Счет</th>
<th>Чек</th>
<th>Действия</th>
</tr>
<?php foreach ($videos as $video) : ?>
<tr>
<td><?= $video['id'] ?></td>
<td><?= $video['fio'] ?></td>
<td><?= $video['phone'] ?></td>
<td><?= $video['address'] ?></td>
<td><?= $video['tariff'] ?></td>
<td><?= $video['bill'] ?></td>
<td><?= $video['chek'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $video['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $videos; ?>
<?php endif; ?>
<p>&nbsp;<?php echo $this->Paginator->numbers(); ?></p>
</div>