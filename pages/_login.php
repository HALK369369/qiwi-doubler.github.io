<section class="default">
<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures">
<div class="login-container">
<div class="row">
<div class="login-form">

<?PHP

	if(isset($_POST["email"])){
	
	$lmail = $func->IsMail($_POST["email"]);
	
		if($lmail !== false){
		
			$db->Query("SELECT id, login, password, referer_id, banned FROM db_users WHERE email = '$lmail'");
			if($db->NumRows() == 1){
			
			$log_data = $db->FetchArray();
			
				if(strtolower($log_data["password"]) == strtolower($_POST["password"])){
				
					if($log_data["banned"] == 0){
						
						# Считаем рефералов
						$db->Query("SELECT COUNT(*) FROM db_users WHERE referer_id = '".$log_data["id"]."'");
						$refs = $db->FetchRow();
						
						$db->Query("UPDATE db_users SET referals = '$refs', date_login = '".time()."', ip = INET_ATON('".$func->UserIP."') WHERE id = '".$log_data["id"]."'");
						
						$_SESSION["user_id"] = $log_data["id"];
						$_SESSION["login"] = $log_data["login"];
						$_SESSION["referer_id"] = $log_data["referer_id"];
						Header("Location: /account");
						
					}else echo "<center><b>Аккаунт заблокирован.</b></center><BR />";
				
				}else echo "<center><b>E-Mail и/или Пароль указан неверно.</b></center><BR />";
			
			}else echo "<center><b>Указанный E-Mail не зарегистрирован в системе.</b></center><BR />";
			
		}else echo "<center><b>E-Mail указан неверно.</b></center><BR />";
	
	}

?>

<form id="enter" method="POST">
E-Mail:
<input class="email" type="text" name="email" maxlength="20">
Пароль:
<input class="password" type="password" name="password" maxlength="30">
</form>

<a class="button alert round disabled expand" href="javascript:with(document.getElementById('enter')){ submit(); }">Авторизироваться</a>
</div>
</div>
</div> 
</div>

<hr>
</section>