<div class="content1">
<?php
echo $this->Form->create('Iptv');
echo $this->Form->input('tariff', ['options' => ['Промо' => 'Промо', 'Базовый' => 'Базовый', 'Супербазовый' => 'Супербазовый', 'Отключено' => 'Отключено'], 'label' => 'Тариф']);
echo $this->Form->input('id');
echo $this->Form->end('Сохранить');
?>
</div>