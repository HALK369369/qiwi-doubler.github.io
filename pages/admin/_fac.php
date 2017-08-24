<div class="login-container">
<div class="row">
<div class="login-form">

<?
include("inc/_admin_menu.php");
?>

<?php
if (isset($_POST['text'])) {
$text = $_POST['text'];
$title = $_POST['title'];
$date = time();

$qwe = $db->Query("INSERT INTO db_fac (date,title,text) VALUES ('$date','$title','$text')");
echo "<center><b>Вопрос добавлен.</b></center>";

}

if(isset($_POST['id'])) {
$id = $_POST['id'];
$asd = $db->Query("DELETE FROM db_fac WHERE id = $id");
echo "<center><b>Удален вопрос №</b></center>".$id;
}
?>

<form method="POST" id="fac">
Название:
<input type="text" name="title">
<br>
Текст:
<textarea name="text" required rows="5"></textarea> 
<br>
<a class="button alert round disabled expand" href="javascript:with(document.getElementById('fac')){ submit(); }">Добавить</a>
</form>

<table data-wow-delay="0.3s" class="flat-table flat-table-1 responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
<thead>
  <tr>
<th>Дата</th>
<th>Название</th>
<th>Текст</th>
<th>Удалить</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?
$con = $db->Query("SELECT * FROM db_fac");
while($fac = $db->FetchArray()) {
$date = date("d.M.y", $fac['date']);
?>
	
<form method="POST" id="delete">
<input type="hidden" name="id" value="<?=$fac['id']; ?>">
<td><?=date("d.m.Y",$fac["date"]); ?></td>
<td><?=$fac['title']; ?></td>
<td><?=$fac['text']; ?></td>
<td><a class="button alert round disabled expand" href="javascript:with(document.getElementById('delete')){ submit(); }"><i class="fa fa-times"></i></a></td>
</tr>
</form>
<? } ?>

</table>
</div>

</div>
</div>
</div>

<hr>