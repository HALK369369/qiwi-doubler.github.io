<script type="text/javascript">(function(w,doc) {
if (!w.__utlWdgt ) {
    w.__utlWdgt = true;
    var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
}})(window,document);
</script>
<div data-share-size="40" data-like-text-enable="false" data-background-alpha="0.0" data-pid="1354599" data-mode="share" data-background-color="#ffffff" data-share-shape="round-rectangle" data-share-counter-size="12" data-icon-color="#ffffff" data-text-color="#ffffff" data-buttons-color="#ffffff" data-counter-background-color="#ffffff" data-share-counter-type="separate" data-orientation="fixed-left" data-following-enable="false" data-sn-ids="fb.vk.tw.ok.gp." data-selection-enable="true" data-exclude-show-more="true" data-share-style="10" data-counter-background-alpha="1.0" data-top-button="false" class="uptolike-buttons" ></div>

<?
$db->Query("SELECT * FROM db_reviews ORDER BY id DESC LIMIT 1");
$reviews = $db->FetchArray();
?>

<?
$db->Query("SELECT * FROM db_stats WHERE id = 1");
$stats = $db->FetchArray();
?>

<div class="pricingboxes-comparison">

<div class="row"> 

<div class="small-12 columns">

</div>

</div>


<div class="spacing-30"></div>


<div class="row collapse">

<div data-wow-delay="0.2s"  class="small-12 large-3 medium-3 columns wow zoomIn">

<div class="title-alt">Пополнено</div>



<h2><?php echo $stats['all_payments']; ?> Руб.</h2>

</div>



<div data-wow-delay="0.4s"  class="small-12 large-3 medium-3 columns wow zoomIn">

<div class="title-alt">Выведено</div>

<h2><?php echo $stats['all_inserts']; ?> Руб.</h2>

</div>



<div data-wow-delay="0.6s"  class="small-12 large-3 medium-3 columns wow zoomIn">

<div class="title-alt">Участников</div>

<h2><?php echo $stats['all_users']; ?> чел.</h2>

</div>



<div data-wow-delay="0.8s"  class="small-12 large-3 medium-3 columns wow zoomIn">

<div class="title-features">Баланс</div>

<h2>{!ALL_BALANCE!} Руб.</h2>

</div>



</div>

</div>


<section class="testimonials">
<div class="row">
<div class="small-12 columns">
<div class="circle"><i class="fa fa-heart"></i></div>
   
      
    <div class="whoclient"><span>Отзыв оставил <a href=""><?=$reviews["name"]; ?></a></span></div>
    <div class="testimonial-content">
   <p><?=$reviews["text"]; ?></p>
   </div>

</div>
</div>
</div>
</section>

<section class="features">
<div class="row">
<div class="small-12 columns">

<center>

<h2>Почему <span><?php echo $stats['all_users']; ?></span> участников доверяют нам?</h2>

</center>

<ul class="small-block-grid-1 large-block-grid-3 medium-block-grid-3">

<li data-wow-delay="0.2s" class="wow fadeInLeft">
<i class="fa fa-usd"></i>
<p>Мы выплачиваем реально высокие проценты от вклада вашего партнера.</p>
</li>
<li data-wow-delay="0.4s" class="wow fadeInLeft">
<i class="fa fa-desktop"></i>
<p>Яркий интуитивно понятный интерфейс поможет вам быстрее заинтересовать партнера принять участие в проекте!</p>
</li>
<li data-wow-delay="0.6s" class="wow fadeInLeft">
<i class="fa fa-star"></i>
<p>Мы постоянно проводим промоакции для посетителей нашего сайта!</p>
</li>
<li data-wow-delay="0.2s" class="wow fadeInRight">
<i class="fa fa-clock-o"></i>
<p>Ваш реферальный доход мы выплатим максимально быстро не создавая не оправданных, долгих и нудных задержек.</p>
</li>
<li data-wow-delay="0.4s" class="wow fadeInRight">
<i class="fa fa-phone"></i>
<p>Адекватная служба поддержки ответит вам в течении 2 часов и подробно проконсультирует по всем вопросам!</p>
</li>
<li data-wow-delay="0.6s" class="wow fadeInRight">
<i class="fa fa-users"></i>
<p>В личном кабинете вам будут доступны баннеры и рекламные тексты для приглашений!</p>
</li>
</ul>
</div>
</div>
</section>

<?if(!isset($_SESSION['login'])):?>
<section class="calltoaction">
<div class="row">
<div class="small-12 columns">
<div data-wow-delay="0.3s" class="longshadow wow fadeInDown">ЕЩЕ НЕ ЗАРЕГИСТРИРОВАНЫ?</div>
<div data-wow-delay="0.5s" class="calltoactioninfo wow fadeInUp">
<h2><span id="partners">0</span><span>%</span> ПАРТНЕРСКАЯ ПРОГРАММА</h2>
<a href="/signup" class="small radius button">ЗАРЕГИСТРИРОВАТЬСЯ</a>
</div>
</div>
</div>
</section>
<?endif?>

<div class="row">
<div class="small-12 columns">

<div class="small-6 columns">
<CENTER /><h4>ПОСЛЕДНИЕ ПОПОЛНЕНИЯ</h4>
<table data-wow-delay="0.3s" class="flat-table flat-table-1 responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
<thead>
  <tr>
<th>Дата</th>
<th>Пользователь</th>
<th>Сумма</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?
$db->Query("SELECT * FROM db_pay WHERE status = 1 ORDER BY id DESC LIMIT 3");
while($a = $db->FetchArray()) {
?>
<td><?=date("d.m.Y H:i", $a['date']); ?></td>
<td><?=$a['login']; ?></td>
<td><?=$a['summa']; ?></td>
</tr>  
<? } ?>
</tbody>
</table>	   
</div>

<div class="small-6 columns">
<CENTER /><h4>ПОСЛЕДНИЕ ВЫПЛАТЫ</h4>
<table data-wow-delay="0.3s" class="flat-table flat-table-1 responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
<thead>
  <tr>
<th>Дата</th>
<th>Пользователь</th>
<th>Сумма</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?
$db->Query("SELECT * FROM db_insert WHERE status = 1 ORDER BY id DESC LIMIT 3");
while($a = $db->FetchArray()) {
?>
<td><?=date("d.m.Y H:i", $a['date']); ?></td>
<td><?=$a['login']; ?></td>
<td><?=$a['summa']; ?></td>
</tr>  
<? } ?>
</tbody>
</table>	   
</div>

</div>
</div>

<BR />
<BR />