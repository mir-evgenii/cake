<h2>Добавление заявки</h2>
<div>
<?php
echo $this->Form->create('Bid');
echo $this->Form->input('text', ['label' => 'Текст']);
echo $this->Form->end('Сохранить');
?>
</div>