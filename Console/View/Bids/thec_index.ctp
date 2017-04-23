<div class="content1">
<?php if(is_array($bids)) : ?>
<table>
<tr>
<th>Имя</th>
<th>Адрес</th>
<th>Телефон</th>
<th>Содержание</th>
<th>Дата создания</th>
<th>Дата изменения</th>
<th>Действия</th>
</tr>
<?php foreach ($bids as $bid) : ?>
<tr>
<td><?= $bid['username'] ?></td>
<td><?= $bid['address'] ?></td>
<td><?= $bid['phone'] ?></td>
<td><?= $this->Html->link( $bid['text'], ['controller' => 'bids', 'action' => 'view', $bid['id'] ] ) ?></td>
<td><?= $bid['created'] ?></td>
<td><?= $bid['modified'] ?></td>
<td><?= $this->Html->link('Изменить', ['action' => 'edit', $bid['id']]) ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else : ?>
<?php echo $bids; ?>
<?php endif; ?>
</div>