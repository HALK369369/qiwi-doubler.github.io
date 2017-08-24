<?PHP

if(isset($_SESSION["user_id"])){ Header("Location: /account"); return; }
?>

<?PHP
	
	# Регистрация

	if(isset($_POST["login"])){
	
	if(isset($_SESSION["captcha"]) AND strtolower($_SESSION["captcha"]) == strtolower($_POST["captcha"])){
	unset($_SESSION["captcha"]);

	$login = $func->IsLogin($_POST["login"]);
	$password = $func->IsPassword($_POST["password"]);
	$rules = isset($_POST["rules"]) ? true : false;
	$time = time();
	$ip = $func->UserIP;
	
	$email = $func->IsMail($_POST["email"]);
	$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
	$referer_name = "";
	if($referer_id != 1){
		$db->Query("SELECT login FROM db_users WHERE id = '$referer_id' LIMIT 1");
		if($db->NumRows() > 0){$referer_name = $db->FetchRow();}
		else{ $referer_id = 1; $referer_name = "demo"; }
	}else{ $referer_id = 1; $referer_name = "demo"; }
	
		if($rules){

			if($email !== false){
		
			if($login !== false){
			
				if($password !== false){
			
					if($password == $_POST["repassword"]){
						
						$db->Query("SELECT COUNT(*) FROM db_users WHERE login = '$login'");
						if($db->FetchRow() == 0){
						
						# Регаем пользователя
						$db->Query("INSERT INTO db_users (login, email, password, referer, referer_id, date_reg, ip) 
						VALUES ('$login','{$email}','$password','$referer_name','$referer_id','$time',INET_ATON('$ip'))");
						
						$lid = $db->LastInsert();
						
						$db->Query("INSERT INTO db_users_ref (id, login) VALUES ('$lid','$login')");
						
						# Вставляем статистику
						$db->Query("UPDATE db_stats SET all_users = all_users +1 WHERE id = '1'");
						
						echo "<center><b>Вы успешно зарегистрировались. Используйте форму для входа в аккаунт.</b></center><BR />";
						?></div>
						<div class="clr"></div>	
						<?PHP
						return;
						}else echo "<center><b>Указанный логин уже используется.</b></center><BR />";
						
					}else echo "<center><b>Пароль и повтор пароля не совпадают.</b></center><BR />";
			
				}else echo "<center><b>Пароль заполнен неверно.</b></center><BR />";
			
			}else echo "<center><b>Логин заполнен неверно.</b></center><BR />";

		}else echo "<center><b>Email имеет неверный формат.</b></center>";

		}else echo "<center><b>Вы не подтвердили правила.</b></center><BR />";
	
		}else echo "<center><b>Символы с картинки введены неверно</b>.</center>";

	}
	
	
?>

<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">

<div class="login-container">

<div class="row">

<div class="login-form">

<BR />

<form action="" method="post" id="registration">

Ваш псевдоним:*

<input name="login" type="text" value="<?=(isset($_POST["login"])) ? $_POST["login"] : false; ?>"/>

Ваш E-Mail:*

<input name="email" type="text" value="<?=(isset($_POST["email"])) ? $_POST["email"] : false; ?>"/>

Пароль:*

<input name="password" type="password" />

Пароль еще раз:*

<input name="repassword" type="password" />

<BR />

<a href="#" onclick="ResetCaptcha(this);"><img send src="/captcha.php?rnd=<?=rand(1,10000); ?>"/></a>

<BR />

Введите символы с картинки:

<input name="captcha" type="text" />

<BR />

<center>С <a href="/rules" target="_blank">правилами</a> проекта ознакомлен(а) и принимаю: <input name="rules" type="checkbox" /></center>

<BR />

<a class="button alert round disabled expand" href="javascript:with(document.getElementById('registration')){ submit(); }">Зарегистрироватья</a>

</form>



<BR />



</div>

</div>

</div> 

</div>



<hr>
