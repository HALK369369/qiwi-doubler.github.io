<?php 

$start_site = 1;
$min_summa = 50; 
$max_summa = 10000; 
$tarif = 50;
$srok = 1;
$perc_tarif = 30; 
$time = time(); //Текущее время в формате UNIX
$last_time = $time + 60; //Начисление раз в сутки! Что бы сделать к примеру начисление раз в час то вместо числа 86400 прописать 3600
$ref_percent = 15;
$time = time();
$db->Query("SELECT * FROM db_deposit WHERE date_end <= '$time' AND status = 0 ");
while($depo = $db->FetchArray()) {
$user_id = $depo['user_id'];
$count_n = $depo['count'];
$count_full = $depo['count_full'];
$id_depo = $depo['id'];
$percent = sprintf($depo['summa'] / 100 * $depo['percent']);	// Проценты
$db->Query("UPDATE db_users_ref SET money = money + '$percent' WHERE id = '$user_id' LIMIT 1");
$db->Query("UPDATE db_deposit SET count = count + 1, date_end = '$last_time'  WHERE id = '$id_depo'");
$db->Query("SELECT * FROM db_deposit WHERE id = '$id_depo'");
$dep = $db->FetchArray();
$count_n = $dep['count'];
$count_full = $dep['count_full'];
	if (intval($count_n) >= $count_full) {
		$db->Query("UPDATE db_deposit SET status = 1 WHERE id = '$id_depo'");
	} 
	mail($adminmail, "Status", "Вроде обращается при обновлениях страници в форме начисления!");
}
mail($adminmail, "Status", "Вроде обращается при обновлениях страници за формой начисления!");
