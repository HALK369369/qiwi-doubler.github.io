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

<h2>Мои вклады:</h2>

<table data-wow-delay="0.3s" class="flat-table flat-table-1 responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
<thead>
  <tr>
<th>ID</th>
<th>Дата</th>
<th>Сумма</th>
<th>Процент</th>
<th>Завершение</th>
<th>Статус</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?php

$db->Query("SELECT * FROM db_deposit WHERE user_id = '$user_id'");

while($depo = $db->FetchArray() ){
$dep_id = $depo['id'];
$date_end = $depo['date_end'];
$date_start = $depo['date_start'];
$count_dep = $depo['count'];
$count_full = $depo['count_full'];
$summa = $depo['summa'];
$login = $depo['login'];
$perc = $depo['percent'];
$status = $depo['status'];

echo '
<tr>
<td>'.$dep_id.'</td>
<td>'.date("d-m-Y", $date_start).'</td>
<td>'.$summa.' Руб.</td>
<td>'.$perc.'% в сутки</td>
<td>'.date("d.m.Y", $date_end).'</td>';



if($status == 0){ echo '<td><i class="fa fa-clock-o"></i></td>'; }
if($status == 1){ echo '<td><i class="fa fa-check"></i></td>'; }


}



?>

</tr>
</table>

</div>
</div>
</div>  

<hr>