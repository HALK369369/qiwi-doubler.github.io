<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$user_info = $db->FetchArray();
?>

<div class="login-container">
<div class="row">
<div class="login-form"> 

<?
include("inc/_user_menu.php");
?>

<h3>Аккаунт:</h3>

<center>
<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">
<div data-alert class="alert-box success">
<p>Добро пожаловать, <?=$user_info["login"]; ?>! Ваш IP - <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
</div>
</div>
</center>

<div class="pricingboxes-comparison">
<div class="row"> 
<div class="small-12 columns">
</div>
</div>

<div class="spacing-30"></div>

<div class="row collapse">
<div data-wow-delay="0.2s"  class="small-12 large-3 medium-3 columns wow zoomIn hostingfeatures">
<div class="title-features">ID</div>

<h2><?=$user_info["id"]; ?></h2>

</div>

<div data-wow-delay="0.4s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Баланс</div>

<h2>{!BALANCE!} Руб.</h2>
</div>

<div data-wow-delay="0.6s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Спонсор</div>

<h2><?=$user_info["referer"]; ?></h2>

</div>


<div data-wow-delay="0.8s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Реферальная прибыль</div>

<h2>{!FROM_REFERALS!} Руб.</h2>

</div>

</div>
</div>
  
<script>
    function summa(){
        var summa= document.getElementById('summa').value;
        if (summa!=""){
            var result=((summa/100)*30);
            var result_totall=((summa/100)*30*30);
            document.getElementById('some').innerHTML = "Прибыль за сутки составит (Руб.):"  + result ; 

    }
    }
    function onlyDigits() {
        this.value = this.value.replace(/[^\d]/g, "");
    }
    document.querySelector(".onlyDigits").onkeyup = onlyDigits
</script>



<h2>Калькулятор прибыли:</h2>

<div class="panel"> 
<div id="some"></div>
<input type="text" name="summa" id="summa" class="onlyDigits" value="" placeholder="Сумма инвестиции (в Руб.)"><br>
<a class="button alert round disabled expand" onclick="summa();" value="raschet" name="raschet" href="javascript:with(document.getElementById('calculator')){ submit(); }">Рассчитать</a>

</div>

</div>
</div>
</div>

<hr>