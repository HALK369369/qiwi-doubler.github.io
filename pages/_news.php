<?PHP

$db->Query("SELECT * FROM db_news ORDER BY id DESC");

if($db->NumRows() > 0){

	while($news = $db->FetchArray()){
	
	?>
	
<div class="row">
<div class="small-12 columns">
<div class="small-block-grid-1 large-block-grid-3 medium-block-grid-3">
<div data-wow-delay="0.2s" class="wow fadeInRight">


<div class="sectionarea blog">
<div class="row"> 
<div class="columns">

<div class="entry">

<h2><a href=""><?=$news["title"]; ?></a></h2>
<p><?=$news["text"]; ?></p>

<div class="meta"><i class="fa fa-calendar"></i> <?=date("d.m.Y",$news["date"]); ?></div>

</div>

</div>
</div>

</div>
</div>

	<?PHP
	
	}

}else echo "<center>Новостей нет.</center>";

?>

</div>
</div>
</div>


<hr>