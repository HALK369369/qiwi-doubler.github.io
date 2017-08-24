<div class="login-container">
<div class="row">
<div class="login-form">

<?
include("inc/_admin_menu.php");
?>

 <?    

 if(isset($_POST['all_users'])) {

   $all_users = floatval($_POST['all_users']);

   $all_inserts = floatval($_POST['all_inserts']);

   $all_payments = floatval($_POST['all_payments']);

   

   $db->Query("UPDATE db_stats SET all_users = '$all_users', all_inserts = '$all_inserts', all_payments = '$all_payments' WHERE id = 1"); 

   echo '<center><b>Статистика обновлена.</b></center>';

 }

 

 

   $db->Query("SELECT * FROM db_stats WHERE id = 1"); 

   $stats = $db->FetchArray();

 ?>


<div class="pricingboxes-comparison">
<div class="row"> 
<div class="small-12 columns">
</div>
</div>

<div class="spacing-30"></div>

<form method="post" action="" id="save">

<div class="row collapse">
<div data-wow-delay="0.2s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Пополнено</div>

<input type="text" name="all_payments" value="<?php echo $stats['all_payments']; ?>">
</div>

<div data-wow-delay="0.4s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Выведено</div>

<input type="text" name="all_inserts" value="<?php echo $stats['all_inserts']; ?>">
</div>

<div data-wow-delay="0.6s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Участников</div>

<input type="text" name="all_users" value="<?php echo $stats['all_users']; ?>">
</div>

<div data-wow-delay="0.8s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-features">Баланс</div>

<h2>{!ALL_BALANCE!} Руб.</h2>
</div>

</div>
</div>

<a class="button alert round disabled expand" href="javascript:with(document.getElementById('save')){ submit(); }">Сохранить</i></a>

</form>

</div>
</div>
</div>

<hr>