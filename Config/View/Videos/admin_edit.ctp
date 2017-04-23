<div>
<?php
echo $this->Form->create('Video');
echo $this->Form->input('tariff', ['options' => ['360 руб/мес' => '360 руб/мес', 'Отключен' => 'Отключен']]);
echo $this->Form->input('bill',  ['label' => 'Счет']);
echo $this->Form->input('chek',  ['label' => 'Чек']);
echo $this->Form->input('id');
echo $this->Form->end('Сохранить');
?>
</div>