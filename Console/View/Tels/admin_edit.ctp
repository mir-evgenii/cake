<div class="content1">
<?php
echo $this->Form->create('Tel');
echo $this->Form->input('tariff', ['options' => ['Безлимитный' => 'Безлимитный', 'Комбинированный' => 'Комбинированный', 'Повременный' => 'Повременный', 'Отключен' => 'Отключен']]);
echo $this->Form->input('bill',  ['label' => 'Счет']);
echo $this->Form->input('chek',  ['label' => 'Чек']);
echo $this->Form->input('id');
echo $this->Form->end('Сохранить');
?>
</div>