<div class="actions">
<ul>

<li><?php echo $this->Html->link('Интернет', ['controller' => 'nets', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Статистика интернета', ['controller' => 'nets', 'action' => 'stat']) ?></li>

<li><?php echo $this->Html->link('Телефон', ['controller' => 'tels', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Статистика телефона', ['controller' => 'tels', 'action' => 'stat']) ?></li>

<li><?php echo $this->Html->link('Видеонаблюдение', ['controller' => 'videos', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Статистика видео.', ['controller' => 'videos', 'action' => 'stat']) ?></li>

<li><?php echo $this->Html->link('IP TV', ['controller' => 'iptvs', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Статистика IP TV', ['controller' => 'iptvs', 'action' => 'stat']) ?></li>

<li><?php echo $this->Html->link('Список пользователей', ['controller' => 'users', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Новый пользователь', ['controller' => 'users', 'action' => 'add']) ?></li>

<li><?php echo $this->Html->link('Список заявок', ['controller' => 'bids', 'action' => 'index']) ?></li>

</ul>
</div>