<div class="content1">
<?php if(is_array($videos)) : ?>
<table>
<tr>
<th>Тариф</th>
<th>Счет</th>
<th>Чек</th>
<th>Действия</th>
</tr>
<?php foreach ($videos as $video) : ?>
<tr>
<td><?= $video['Video']['tariff'] ?></td>
<td><?= $video['Video']['bill'] ?></td>
<td><?= $video['Video']['chek'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $video['Video']['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $videos; ?>
<?php endif; ?>
</div>