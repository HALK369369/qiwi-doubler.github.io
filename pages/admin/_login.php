<div class="login-container">
<div class="row">
<div class="login-form">

<?PHP
if(isset($_SESSION["admin"])){ Header("Location: /admin"); return; }

if(isset($_POST["adminlogin"])){

	$db->Query("SELECT * FROM db_admin WHERE id = 1 LIMIT 1");
	$data_log = $db->FetchArray();
	
	if(strtolower($_POST["adminlogin"]) == strtolower($data_log["login"]) AND strtolower($_POST["adminpassword"]) == strtolower($data_log["password"]) ){
	
		$_SESSION["admin"] = true;
		Header("Location: /admin");
		return;
	}else echo "<center><b>Неверно введен логин и/или пароль</b></center><BR />";
	
}

?>
 
<form id="adminlogin" method="POST">
Логин:
<input class="login" type="text" name="adminlogin" maxlength="20">
Пароль:
<input class="password" type="password" name="adminpassword" maxlength="30">
</form>

<a class="button alert round disabled expand" href="javascript:with(document.getElementById('adminlogin')){ submit(); }">Авторизироваться</a>
</form>
         
</div>
</div>      	
</div>      	      		   





