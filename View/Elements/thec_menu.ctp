<div class="actions">
<ul>
<li><a href="/cake">Главная</a></li>

<li><?php echo $this->Html->link('Список пользователей', ['controller' => 'users', 'action' => 'index']) ?></li>

<li><?php echo $this->Html->link('Заявки', ['controller' => 'bids', 'action' => 'index']) ?></li>
</ul>
</div>