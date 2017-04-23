<div class="actions">
<ul>
<li><a href="/cake">Главная</a></li>
<li><?php echo $this->Html->link('Интернет', ['controller' => 'nets', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Телефон', ['controller' => 'tels', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Видеонаблюдение', ['controller' => 'videos', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('IP TV', ['controller' => 'iptvs', 'action' => 'index']) ?></li>
<li><?php echo $this->Html->link('Список пользователей', ['controller' => 'users', 'action' => 'index']) ?></li>

</ul>
</div>