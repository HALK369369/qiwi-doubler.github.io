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

$qwe = $db->Query("INSERT INTO db_news (date,title,text) VALUES ('$date','$title','$text')");
echo "<center><b>Новость добавлена.</b></center>";

}

if(isset($_POST['id'])) {
$id = $_POST['id'];
$asd = $db->Query("DELETE FROM db_news WHERE id = $id");
echo "<center><b>Удалена новость №</b></center>".$id;
}
?>

<form method="POST" id="news">
Название:
<input type="text" name="title">
<br>
Текст:
<textarea name="text" required rows="5"></textarea>
<br>
<a class="button alert round disabled expand" href="javascript:with(document.getElementById('news')){ submit(); }">Добавить</a>
</form>

<table data-wow-delay="0.3s" class="flat-table flat-table-1 responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
<thead>
  <tr>
<th>ID</th>
<th>Дата</th>
<th>Название</th>
<th>Текст</th>
<th>Удадить</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?
$con = $db->Query("SELECT * FROM db_news");
while($c = $db->FetchArray()) {
$date = date("d.M.y", $c['date']);
?>
	
<form method="POST" id="delete">
<input type="hidden" name="id" value="<?=$c['id']; ?>">
<td><?=$c['id']; ?></td>
<td><?=date("d.m.Y",$c["date"]); ?></td>
<td><?=$c['title']; ?></td>
<td><?=$c['text']; ?></td>
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