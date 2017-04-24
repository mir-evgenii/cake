<h2>Оплата интернета</h2>

<?php echo $this->element('menu') ?>

<div class="content1">
<?php

$order_id = $user[0]['User']['id'];
$pay = $nets[0]['Net']['bill'];
?>

<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
    <input type="hidden" name="receiver" value="41001xxxxxxxxxxxx">
    <input type="hidden" name="formcomment" value="Оплата интернета">
    <input type="hidden" name="short-dest" value="Оплата интернета">
    <input type="hidden" name="label" value="$order_id">
    <input type="hidden" name="quickpay-form" value="donate">
    <input type="hidden" name="targets" value="транзакция {order_id}">
    <input type="hidden" name="sum" value="$pay" data-type="number">
    <input type="hidden" name="comment" value="">
    <input type="hidden" name="need-fio" value="true">
    <input type="hidden" name="need-email" value="false">
    <input type="hidden" name="need-phone" value="true">
    <input type="hidden" name="need-address" value="false">
    <label><input type="radio" name="paymentType" value="PC">Яндекс деньгами</label>
    <label><input type="radio" name="paymentType" value="AC">Банковской картой</label>
    <input type="submit" value="Перевести">
</form>

</div>