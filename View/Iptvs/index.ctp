<h2>IP TV</h2>

<?php echo $this->element('menu') ?>

<div class="content1">
<?php if(is_array($iptvs)) : ?>
<table>
<tr>
<th>Id</th>
<th>Тариф</th>
<th>Счет</th>
<th>Чек</th>
<th>Действия</th>
</tr>
<?php foreach ($iptvs as $iptv) : ?>
<tr>
<td><?= $iptv['Iptv']['id'] ?></td>
<td><?= $iptv['Iptv']['tariff'] ?></td>
<td><?= $iptv['Iptv']['bill'] ?></td>
<td><?= $iptv['Iptv']['chek'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $iptv['Iptv']['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $iptvs; ?>
<?php endif; ?>
</div>