<div>
<?php
echo $this->Form->create('Iptv');
echo $this->Form->input('tariff', ['options' => ['Промо' => 'Промо', 'Базовый' => 'Базовый', 'Супербазовый' => 'Супербазовый', 'Отключено' => 'Отключено']]);
echo $this->Form->input('bill',  ['label' => 'Счет']);
echo $this->Form->input('chek',  ['label' => 'Чек']);
echo $this->Form->input('id');
echo $this->Form->end('Сохранить');
?>
</div>