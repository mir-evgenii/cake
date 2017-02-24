<div>
<?php
echo $this->Form->create('Iptv');
echo $this->Form->input('tariff', ['options' => ['Промо' => 'Промо', 'Базовый' => 'Базовый', 'Супербазовый' => 'Супербазовый', 'Отключено' => 'Отключено']]);
echo $this->Form->input('id');
echo $this->Form->end('Сохранить');
?>
</div>