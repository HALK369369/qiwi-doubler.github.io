<?PHP
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$usid'");
$user_data = $db->FetchArray();
?>

<div class="login-container">
<div class="row">
<div class="login-form"> 

<?
include("inc/_user_menu.php");
?>

<?PHP
	if(isset($_POST["old"])){
	
		$old = $func->IsPassword($_POST["old"]);
		$oldd = $func->md5Password($old);
		$new = $func->IsPassword($_POST["new"]);
		$password = $func->md5Password($new);
		
			if($old !== false AND strtolower($oldd) == strtolower($user_data["password"])){
			
				if($new !== false){
				
					if( strtolower($new) == strtolower($_POST["re_new"])){
					
						$db->Query("UPDATE db_users SET password = '$password' WHERE id = '$usid'");
						
						echo "<center><b>Новый пароль успешно установлен.</b></center><BR />";
					
					}else echo "<center><b>Пароль и повтор пароля не совпадают.</b></center><BR />";
				
				}else echo "<center><b>Новый пароль имеет неверный формат.</b></center><BR />";
			
			}else echo "<center><b>Старый паполь заполнен неверно.</b></center><BR />";
		
	}
?>

<h3>Настройки:</h3>

<center>
<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">
<div data-alert class="alert-box success">
<p><i class="fa fa-info-circle"></i> Всегда держите свои данные актуальными. Неправильные или неполные данные могут негативно повлиять на обработку ваших вкладов.</p>
</div>
</div>
</center>

<h4>Профиль:</h4>

<form id="new" method="POST">

<div class="pricingboxes-comparison">
<div class="row"> 
<div class="small-12 columns">
</div>
</div>

<div class="spacing-30"></div>

<div class="row collapse">
<div data-wow-delay="0.2s"  class="small-12 large-3 medium-3 columns wow zoomIn hostingfeatures">
<div class="title-features">ID</div>

<h2><?=$prof_data["id"]; ?></h2>

</div>

<div data-wow-delay="0.4s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-features">Логин</div>

<h2><?=$prof_data['login']; ?></h2>
</div>

<div data-wow-delay="0.6s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Qiwi Кошелек</div>


<?PHP
	if(isset($_POST["new_qiwi"])){
	
		$new_qiwi = ($_POST["new_qiwi"]);
		$qiwi = ($new_qiwi);

						$db->Query("UPDATE db_users SET qiwi = '$qiwi' WHERE id = '$usid'");
						
	}
?>

<input type="text" value="<?=$prof_data['qiwi']; ?>" name="new_qiwi" />

</div>


<div data-wow-delay="0.8s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">В Контакте</div>

<?PHP
	if(isset($_POST["new_vk"])){
	
		$new_vk = ($_POST["new_vk"]);
		$vk = ($new_vk);

						$db->Query("UPDATE db_users SET vk = '$vk' WHERE id = '$usid'");
						
	}
?>

<input type="text" value="<?=$prof_data['vk']; ?>" name="new_vk" />

</div>

</div>

<div class="pricingboxes-comparison">
<div class="row"> 
<div class="small-12 columns">
</div>
</div>

<div class="spacing-30"></div>

<div class="row collapse">
<div data-wow-delay="0.2s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Имя</div>

<?PHP
	if(isset($_POST["new_firstname"])){
	
		$new_firstname = ($_POST["new_firstname"]);
		$firstname = ($new_firstname);

						$db->Query("UPDATE db_users SET firstname = '$firstname' WHERE id = '$usid'");

	}
?>

<input type="text" value="<?=$prof_data['firstname']; ?>" name="new_firstname" />

</div>

<div data-wow-delay="0.4s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Фамилия</div>

<?PHP
	if(isset($_POST["new_lastname"])){
	
		$new_lastname = ($_POST["new_lastname"]);
		$lastname = ($new_lastname);

						$db->Query("UPDATE db_users SET lastname = '$lastname' WHERE id = '$usid'");

	}
?>

<input type="text" value="<?=$prof_data['lastname']; ?>" name="new_lastname" />

</div>

<div data-wow-delay="0.6s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-features">E-Mail</div>

<center><h4><?=$prof_data['email']; ?></h4></center>

</div>

<div data-wow-delay="0.8s"  class="small-12 large-3 medium-3 columns wow zoomIn">
<div class="title-alt">Телефон</div>

<?PHP
	if(isset($_POST["new_tel"])){
	
		$new_tel = ($_POST["new_tel"]);
		$tel = ($new_tel);

						$db->Query("UPDATE db_users SET tel = '$tel' WHERE id = '$usid'");

	}
?>

<input type="text" value="<?=$prof_data['tel']; ?>" name="new_tel" />

</div>

<a class="button alert round disabled expand" href="javascript:with(document.getElementById('new')){ submit(); }">Сохранить</a>

</form>

<div class="panel">
<h4>Сменить пароль:</h4>

<form id="newpassword" method="POST">
Старый пароль:
<input type="password" name="old" /></td>
Новый пароль:
<input type="password" name="new" />
Повтор пароля:
<input type="password" name="re_new" />

<a class="button alert round disabled expand" href="javascript:with(document.getElementById('newpassword')){ submit(); }">Сохранить</a>
</form>
</div>

<BR />

</div>
</div>
</div>

</div>
</div>
</div>

<hr>