<div class="actions">
<ul>
<li><?php echo $this->Html->link('Интернет', ['controller' => 'nets', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Телефон', ['controller' => 'tels', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Видеонаблюдение', ['controller' => 'videos', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('IP TV', ['controller' => 'iptvs', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Список заявок', ['controller' => 'bids', 'action' => 'index']) ?></li>

<li><?php echo $this->Html->link('Новая заявка', ['controller' => 'bids', 'action' => 'add']) ?></li>
</ul>
</div>