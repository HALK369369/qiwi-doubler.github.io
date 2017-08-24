<div class="row">

<div class="small-12 columns">

<div class="small-block-grid-1 large-block-grid-3 medium-block-grid-3">

<div data-wow-delay="0.2s" class="wow fadeInRight">



<center>

<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">

<div data-alert class="alert-box success">

<p><i class="fa fa-info-circle"></i> Если вы не нашли ответ, на интересующий вас вопрос, обратитесь в тех.поддежку администрации: Skype - ..., E-Mail - support@....ru</p>

</div>

</div>

</center>



</div>

</div>

</div>

</div>



<?PHP



$db->Query("SELECT * FROM db_fac ORDER BY id DESC");



if($db->NumRows() > 0){



	while($fac = $db->FetchArray()){

	

	?>	

<BR />

<div class="row">
<div class="small-12 columns">
<div class="small-block-grid-1 large-block-grid-3 medium-block-grid-3">
<div data-wow-delay="0.2s" class="wow fadeInRight">
<h5><?=$fac["title"]; ?></h5>
<p><?=$fac["text"]; ?></p>
</div>
</div>
</div>
</div>

	<?PHP

	

	}



}else echo "<center>Вопросов нет.</center>";



?>



</div>

</div>

</div>





<hr>