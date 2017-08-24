<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$balance = $db->FetchArray();
$login = $balance['login'];
?>

<div class="login-container">
<div class="row">
<div class="login-form">

<?
include("inc/_user_menu.php");
?>

<h2>Пополнение:</h2>

<center>
<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">
<div data-alert class="alert-box success">
<p><i class="fa fa-info-circle"></i> Пополнение происходит с помощью платежной системы Qiwi Кошелек.<BR />Пополнение от 50 до 10 000 Руб.</p> 
</div>
</div>
</center>


<h4><i class="fa fa-info-circle"></i> Как пополнить аккаунт?</h4>
<li>Заходим в свой кошелёк на сайте <b>w.qiwi.com</b></li>
<li>Выбираем раздел "Перевод" . Выбираем слева тип перевода "На другой кошелек"</li>
<li>Вводим номер кошелька <b>+1234567890</b></li>
<li>Вводим необходимую сумму от 50 до 10 000 Руб.</li>
<li>Нажимаем кнопку"Оплатить"</li>
<li>Подтверждаем покупку</li>
<li>В открывшемся окне переходим "Посмотреть статус платежа"</li>
<li>Копируем и вставляем номер транзакции (пример номера транзакции 999999900424093868)</li>

<?php	
if (isset($_POST['code'])) {
$time = time();
$summa = $_POST['summa'];
$code = $_POST['code'];
$status = 0; 
	if($batch !== false) {
			$db->Query("INSERT INTO db_pay (summa, user_id, login, date, status, code) 
			VALUES ('$summa', '$user_id', '$login', '$time', '$status', '$code') ");
			$lid = $db->LastInsert();
			
			echo "<center><b>Заявка отправлена!</b></center>";
			
	}else echo "<center><b>Ваучер имеет неверное значение!</b></center>";

}

?>

<BR />

<div class="panel">
<form id="pay" action="" method="POST">
Сумма:
<input type="text" name="summa">
Код транзакции:
<input type="text" name="code">
</form>

<a class="button alert round disabled expand" href="javascript:with(document.getElementById('pay')){ submit(); }">Пополнить</a>
</div>

<table data-wow-delay="0.3s" class="flat-table flat-table-1 responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
<thead>
  <tr>
<th>Сумма</th>
<th>Код транзакции</th>
<th>Дата</th>
<th>Статус</th>
 </tr>
  </thead>
  <tbody>
    <tr>	
<?
$db->Query("SELECT * FROM db_pay WHERE user_id = '$user_id' ORDER BY id DESC");
while($pay = $db->FetchArray() ) {
$code = $pay['code'];
$summa = $pay['summa'];
$date = $pay['date'];
$status = $pay['status'];
?>
<tr>
<td>
<?
if($summa == 0) { echo "-//-"; } else { echo $summa; } 
?>
</td>
<td><?php echo $code; ?></td>
<td><?php echo date('d-m-Y', $date); ?></td>

<?php
if($status == 0){ echo '<td><i class="fa fa-clock-o"></i></td>'; }
if($status == 1){ echo '<td><i class="fa fa-check"></i></td>'; }
if($status == 2){ echo '<td><i class="fa fa-dates"></i></td>'; }

?>
</td>
</tr>
<?php } ?>
</table>
</div>

</div>
</div>
</div>


<hr>