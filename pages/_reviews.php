<div class="row">
<div class="small-12 columns">
<div class="small-block-grid-1 large-block-grid-3 medium-block-grid-3">
<div data-wow-delay="0.2s" class="wow fadeInRight">

<BR />

<p>Обычно страница "Отзывы", чуть более чем полностью, состоит из отзывов, написанных непонятно кем и непонятно когда. Думаю не ошибусь, если скажу что обычно эти отзывы владельцы сайта оставляют сами себе. Поэтому, обычно, на этой странице находится полная чушь, не имеющая никакого отношения к реальности.  Но только не у нас.</p>

<?PHP

if(isset($_POST['text'])) {
$text = $db->RealEscape($_POST['text']);

if(isset($_SESSION['login'])) {
if(!empty($text)) {
$login = $_SESSION['login'];
$date = time();
$db->Query("INSERT INTO db_reviews (name, date, text, status) VALUES ('$login', '$date', '$text', 0)");
echo '<center>Ваш отзыв успешно добавлен и появится после проверки модератором на наличие соблюдения правил!</center>';
header("Refresh: 2, /reviews");
}else echo '<center>Введите текст отзыва!</center>';
}else echo '<center>Для добавления отзыва необходимо авторизоваться!</center>';
}
?>
	
<?
	
$db->Query("SELECT * FROM db_reviews WHERE status = 1 ORDER BY id DESC");

if($db->NumRows() > 0){

	while($reviews = $db->FetchArray()){
	
	?>
	
<div class="sectionarea blog">
<div class="row"> 
<div class="columns">

<div class="entry">

<h4><a href=""><?=$reviews["name"]; ?></a></h4>
<p><?=$reviews["text"]; ?></p>

<div class="meta"><i class="fa fa-calendar"></i> <?=date("d.m.Y",$reviews["date"]); ?></div>

</div>

</div>
</div>

</div>

<BR />

	<?PHP
	
	}

}else echo "<center>Отзывов нет.</center>";
?>

<BR />

<?if(!isset($_SESSION['login'])):?>

<center>Для добавления отзыва необходимо авторизоваться!</center>

<?endif?>

<BR />

<?
if (isset($_SESSION['login'])) {
 ?>
 
<center>
<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">
<div data-alert class="alert-box success">
<p><i class="fa fa-info-circle"></i> Перед публикацией все отзывы проходят модерацию.</p>
</div>
</div>
</center>

<h3>Оставить отзыв:</h3>
<form method="post" action="" id="reviews">
<textarea name="text" required rows="5"></textarea>
<BR />
<a class="button alert round disabled expand" href="javascript:with(document.getElementById('reviews')){ submit(); }">Отправить</a>
</form>

<? } ?>

</div>
</div>
</div>
</div>

<hr>