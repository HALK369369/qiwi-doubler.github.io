<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_ref WHERE id = '$user_id'");
$balance = $db->FetchArray();
$login = $balance['login'];
?>

<div class="login-container">
<div class="row">
<div class="login-form">

<?
include("inc/_user_menu.php");
?>

<center>
<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">
<div data-alert class="alert-box success">
<p><i class="fa fa-info-circle"></i> Вывод в проекте производятся в ручном режиме в течении 24 часов.<BR />Вывод от 10 до 10 000 рублей.</p> 
</div>
</div>
</center>

<?
            $db->Query("SELECT COUNT(*) FROM db_insert WHERE user_id = '$user_id' AND status = 0");
			if($db->FetchRow() == 0){
				
		    
				
if(isset($_POST['summa'])){
$summa = sprintf ("%01.2f", str_replace(',', '.', $_POST['summa']));
$time = time();
$status = 0;
$qiwi = $_POST['qiwi'];
	if($balance['money'] < $summa) {
		echo "<center><b>Недостаточно средств на балансе.</b></center><BR />";
	} elseif ($summa < $min_summa) {
		echo "<center><b>Минимум для вывода ".$min_summa.".</b></center><BR />";
	} elseif ($summa > $max_summa) {
		echo "<center><b>Максимум для вывода ".$max_summa.".</b></center><BR />";
	} else {
		$db->Query("INSERT INTO db_insert (login, qiwi, user_id, summa, date, status) 
			VALUES ('$login', '$qiwi', '$user_id', '$summa', '$time', '$status') ");
			
			$db->Query("UPDATE db_users_ref SET money = money - '$summa' WHERE id = '$user_id' LIMIT 1");
			$db->Query("UPDATE db_stats SET all_payments = all_payments + '$summa' WHERE id = 1");
			
			echo "<center><b>Ваша заявка отправлена в очередь на выполнение!</b></center>";
	        

	}


}

            }else echo "<center><b>У вас имеются необработанные заявки. Дождитесь их выполнения.</b></center><BR />";

?>

<BR />

<div class="panel">
<form method="POST" id="withdraw">
<?
$db->Query("SELECT * FROM db_users_ref WHERE id = '$user_id'");
$balance = $db->FetchArray();
?>
Кошелек:
<input type="text" name="qiwi">
Сумма:
<input type="text" name="summa">
<a class="button alert round disabled expand" href="javascript:with(document.getElementById('withdraw')){ submit(); }">Вывести</a>
</form>
</div>

<table data-wow-delay="0.3s" class="flat-table flat-table-1 responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
<thead>
  <tr>
<th>ID</th>
<th>Дата</th>
<th>Кошелек</th>
<th>Сумма</th>
<th>Статус</th>
 </tr>
  </thead>
  <tbody>
    <tr>
	
<?
$db->Query("SELECT * FROM db_insert WHERE user_id = '$user_id'");
while($insert = $db->FetchArray() ) {
$id = $insert['id'];
$summa = $insert['summa'];
$qiwi = $insert['qiwi'];
$login = $insert['login'];
$date = $insert['date'];
$status = $insert['status'];
?>

<td><?php echo $id; ?></td>
<td><?php echo date('d.m.Y', $date); ?></td>
<td><?php echo $qiwi; ?></td>
<td><?php echo str_replace('.00','',number_format($summa,2,'.',',')); ?> Руб.</td>
<?php
if($status == 0){ echo '<td><i class="fa fa-clock-o"></i></td>'; }
elseif ($status == 1) { echo '<td><i class="fa fa-check"></i></td>'; }
elseif ($status == 2) { echo '<td><i class="fa fa-times"></i></td>'; }
?>
</td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
</div>
</div>

<hr>