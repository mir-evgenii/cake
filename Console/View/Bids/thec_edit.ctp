
<div>
<?php
echo $this->Form->create('Bid');
echo $this->Form->input('status', ['label' => 'Статус', 'options' => ['Не выполнено' => 'Не выполнено', 'Выполнено' => 'Выполнено']]);
echo $this->Form->input('id');
echo $this->Form->end('Сохранить');
?>
</div>