<?PHP

$user_id = $_SESSION["user_id"];

$db->Query("SELECT * FROM db_users_ref WHERE id = '$user_id'");

$balance = $db->FetchArray();
?> 

<div class="login-container">
<div class="row">
<div class="login-form"> 

<?
include("inc/_user_menu.php");
?>

<h2>Вложить:</h2>

<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">
<div data-alert class="alert-box success">
<center>
<p><i class="fa fa-info-circle"></i> Для того, чтобы сделать вклад, Вам требуется выбрать тариф.</p> 
</center>
</div>
</div>

<?PHP

if ( isset($_POST['ps']) ) {

	$ps = intval($_POST['ps']);

	$summa = $_POST['summa'];

	if ($ps == 1) {

			$sum_tarif = $tarif;

			$time_tarif = $srok;

			$perc_tarif = $perc_tarif;

			$count = $srok;

			$sutki = $srok;

			$percent = $perc_tarif / $sutki;

		} 
		

		if($ps < 1 or $ps > 3) {

			echo '<center><b>Выберите тариф!</b></center>';

		} elseif ($summa < $sum_tarif) {

			echo '<center><b>Минимальная сумма для вклада.'.$sum_tarif.'</b></center>';		

		} elseif ($balance['money'] < $summa) {

			echo "<center><b>Недостаточно средств на балансе!</b></center>";

		} elseif ($summa > 30000) {

			echo "<center><b>Максимальная сумма для вклада 3000 Руб.</b></center>";

		} else { 

			$db->Query("INSERT INTO db_deposit (user_id, login, date_start, date_end, summa, percent, count_full) 

			VALUES ('$user_id', '$login', '$time', '$last_time', '$summa', '$percent', '$count') ");

			$db->Query("UPDATE db_users_ref SET money = money - '$summa' WHERE id = '$user_id' LIMIT 1");

			$money_referer = $summa / 100 * $ref_percent;
				 
            $db->Query("SELECT login, referer_id FROM db_users WHERE id = '$user_id' LIMIT 1");
			$referer = $db->FetchArray();
            $referer_login = $referer["login"];
            $referer_id = $referer["referer_id"];
			
			$db->Query("UPDATE db_users_ref SET to_referer = to_referer + '$money_referer' WHERE id = '$user_id' LIMIT 1");
			
            $db->Query("UPDATE db_users_ref SET from_referals = from_referals + '$money_referer' WHERE id = '$referer_id'");
            
			$db->Query("UPDATE db_users_ref SET money = money + '$money_referer' WHERE id = '$referer_id'");
			
			echo "<center><b>Вклад успешно создан!</b></center>";

		

		}









}


if ($start_site == 1) {

?>

<BR />

<div class="panel">
<form id="deposit" method="POST">
Тарифы:
<select name="ps">
<option value="0"> - выберите тариф</option>
<option value="1">... - <?=$perc_tarif; ?>% на 24 часа, минимальный вклад <?=$tarif; ?> Руб.</option>
</select>
Сумма:
<input type="text" name="summa"></td>
<a class="button alert round disabled expand" href="javascript:with(document.getElementById('deposit')){ submit(); }">Вложить</a>
</form>

<?

} else {

?>

Вклады будут доступны после старта проекта!

<?

}

?>

</div>

</div>
</div>
</div>

<hr>