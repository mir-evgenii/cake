<div class="content1">
<?php
echo $this->Form->create('Net');
echo $this->Form->input('tariff', ['options' => ['iFlat 390' => 'iFlat 390', 'iFlat 490' => 'iFlat 490', 'iFlat 590' => 'iFlat 590', 'iFlat 690' => 'iFlat 690', 'iFlat 790' => 'iFlat 790', 'Отключен' => 'Отключен'], 'label' => 'Тариф']);
echo $this->Form->input('bill',  ['label' => 'Счет']);
echo $this->Form->input('chek',  ['label' => 'Чек']);
echo $this->Form->input('id');
echo $this->Form->end('Сохранить');
?>
</div>