<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$balance = $db->FetchArray();
?>

<div class="login-container">
<div class="row">
<div class="login-form"> 

<?
include("inc/_user_menu.php");
?>

<h2>Партнерская программа:</h2>

<center>
<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">
<div data-alert class="alert-box success">
<p><i class="fa fa-info-circle"></i> Система очень простая: вы получаете 15% от каждой инвестиции вашего реферала, приведенного вами по уникальной ссылке, которую выполучаете после регистрации. Пользователь пришедший по вашей уникальной ссылке и создавший себе аккаунт, автоматически закрепляется за вами.</p> 
</div>
</div>
</center>

<div class="panel">
Ваша реферальная ссылка: 
<input type="text"  value="http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?>" disabled>
</div>

<h2>Рефералы:</h2>

<table data-wow-delay="0.3s" class="flat-table flat-table-1 responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
<thead>
  <tr>
<th>Пользователь</th>
<th>Дата регистрации</th>
<th>Доход от партнера</th>
 </tr>
  </thead>
  <tbody>
    <tr>
	
	
<?PHP
  $all_money = 0;
  $db->Query("SELECT db_users.login, db_users.date_reg, db_users_ref.to_referer FROM db_users, db_users_ref 
  WHERE db_users.id = db_users_ref.id AND db_users.referer_id = '$user_id' ORDER BY to_referer DESC");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>

	
<td><i class="fa fa-user"></i> <?=$ref["login"]; ?></td>
<td><?=date("d.m.Y в H:i:s",$ref["date_reg"]); ?></td>
<td><?=$ref["to_referer"]; ?> Руб.</td>	
</tr>

<?PHP
		$all_money += $ref["to_referer"];
		}
		
		}else echo '<center><b>У вас нет рефералов.</b><center>'
  ?>
  
</tbody>
</table>

</div>
</div>
</div>

<hr>