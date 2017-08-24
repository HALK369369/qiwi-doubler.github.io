<?PHP
$not_counters = true;

if(!isset($_SESSION["admin"])){ include("pages/admin/_login.php"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; 
		case "insert": include("pages/admin/_insert.php"); break;
		case "pay": include("pages/admin/_pay.php"); break;
		case "news": include("pages/admin/_news.php"); break;
        case "users": include("pages/admin/_users.php"); break;
        case "reviews": include("pages/admin/_reviews.php"); break;
        case "sender": include("pages/admin/_sender.php"); break; 
        case "fac": include("pages/admin/_fac.php"); break; 		


			
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/admin/_stats.php");

?>