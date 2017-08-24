<?PHP
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; 
		case "deposit": include("pages/account/_deposit.php"); break; 
		case "ref": include("pages/account/_ref.php"); break; 
		case "deposits": include("pages/account/_deposits.php"); break; 
		case "insert": include("pages/account/_insert.php"); break;
		case "pay": include("pages/account/_pay.php"); break; 
		case "config": include("pages/account/_config.php"); break; 
				
		case "exit": @session_destroy(); Header("Location: /"); return; break; // Выход
				

	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>