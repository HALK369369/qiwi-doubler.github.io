<?PHP         
function TimerSet(){
	list($seconds, $microSeconds) = explode(' ', microtime());
	return $seconds + (float) $microSeconds;
}

$_timer_a = TimerSet();

@session_start();

@ob_start();

$_OPTIMIZATION = array();
$_OPTIMIZATION["title"] = "...";
$_OPTIMIZATION["description"] = "...";
$_OPTIMIZATION["keywords"] = "...";

define("CONST_WMRUSH", true);

function __autoload($name){ include("classes/_class.".$name.".php");}

$config = new config;

$func = new func;

include("inc/_set_referer.php");

$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);
@include("config.php");

@include("inc/_header.php");

		if(isset($_GET["menu"])){
		
			$menu = strval($_GET["menu"]);
			
			switch($menu){
			
				case "404": include("pages/_404.php"); break; 
				case "rules": include("pages/_rules.php"); break; 
				case "about": include("pages/_about.php"); break;  
				case "news": include("pages/_news.php"); break; 
				case "signup": include("pages/_signup.php"); break; 
				case "reviews": include("pages/_reviews.php"); break; 
				case "fac": include("pages/_fac.php"); break; 
				case "login": include("pages/_login.php"); break;
				case "recovery": include("pages/_recovery.php"); break; 
				case "account": include("pages/_account.php"); break; 
				case "contacts": include("pages/_contacts.php"); break;
				case "admin": include("pages/_admin.php"); break;
                case "recovery": include("pages/_recovery.php"); break;
				
				
		
			default: @include("pages/_404.php"); break;
			
			}
			
		}else @include("pages/_index.php");
		
@include("inc/_footer.php");



$content = ob_get_contents();


ob_end_clean();

	$content = str_replace("{!TITLE!}",$_OPTIMIZATION["title"],$content);
	$content = str_replace('{!DESCRIPTION!}',$_OPTIMIZATION["description"],$content);
	$content = str_replace('{!KEYWORDS!}',$_OPTIMIZATION["keywords"],$content);
	$content = str_replace('{!GEN_PAGE!}', sprintf("%.5f", (TimerSet() - $_timer_a)) ,$content);
	
		if(isset($_SESSION["user_id"])){
	
		$user_id = $_SESSION["user_id"];
		$db->Query("SELECT money FROM db_users_ref WHERE id = '$user_id'");
		$balance = $db->FetchArray();
		
		$content = str_replace('{!BALANCE!}', sprintf("%.2f", $balance["money"]) ,$content);
	}
     
	if(isset($_SESSION["user_id"])){
	
		$user_id = $_SESSION["user_id"];
		$db->Query("SELECT from_referals FROM db_users_ref WHERE id = '$user_id'");
		$balance = $db->FetchArray();
		
		$content = str_replace('{!FROM_REFERALS!}', sprintf("%.2f", $balance["from_referals"]) ,$content);				
	    }		$db->Query("SELECT all_payments - all_inserts FROM db_stats WHERE id = 1");		$balance = $db->FetchArray();				$content = str_replace('{!ALL_BALANCE!}', sprintf("%.2f", $balance["all_payments - all_inserts"]) ,$content);					    
		
echo $content;
?>