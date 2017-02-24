<h2>Изменение настроек пользователя</h2>

<?php echo $this->element('menu') ?>

<div>
<?php
echo $this->Form->create('Iptv');
echo $this->Form->input('tariff', ['label' => 'Тариф']);
echo $this->Form->input('bill',  ['label' => 'Счет']);
echo $this->Form->input('chek',  ['label' => 'Чек']);
echo $this->Form->input('id');
echo $this->Form->end('Сохранить');
?>
</div>