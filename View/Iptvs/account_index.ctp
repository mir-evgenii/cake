<div class="content1">

<?php if(is_array($iptvs)) : ?>

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
<?php foreach ($iptvs as $iptv) : ?>
<tr>
<td><?= $iptv['id'] ?></td>
<td><?= $iptv['fio'] ?></td>
<td><?= $iptv['phone'] ?></td>
<td><?= $iptv['address'] ?></td>
<td><?= $iptv['tariff'] ?></td>
<td><?= $iptv['bill'] ?></td>
<td><?= $iptv['chek'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $iptv['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $iptvs; ?>
<?php endif; ?>
<p>&nbsp;<?php echo $this->Paginator->numbers(); ?></p>
</div>