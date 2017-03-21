<div class="content1">
<?php if(is_array($bids)) : ?>
<table>
<tr>
<th>Содержание</th>
<th>Статус</th>
<th>Дата создания</th>
<th>Дата изменения</th>
<th>Действия</th>
</tr>
<?php foreach ($bids as $bid) : ?>
<tr>
<td><?= $this->Html->link( $bid['Bid']['text'], ['controller' => 'bids', 'action' => 'view', $bid['Bid']['id'] ] ) ?></td>
<td><?= $bid['Bid']['status'] ?></td>
<td><?= $bid['Bid']['created'] ?></td>
<td><?= $bid['Bid']['modified'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $bid['Bid']['id']]) ?> | <?php echo $this->Form->postLink('Удалить', array('action' => 'delete', $bid['Bid']['id']),['confirm' => 'Подтвердите удаление']) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $bids; ?>
<?php endif; ?>
</div>