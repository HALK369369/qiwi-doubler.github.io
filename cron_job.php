<?PHP
@error_reporting(E_ALL ^ E_NOTICE);
@ini_set('display_errors', true);
@ini_set('html_errors', false);
@ini_set('error_reporting', E_ALL ^ E_NOTICE);
# ����������� ������
function __autoload($name){ include("classes/_class.".$name.".php");}


# ����� ������� 
$config = new config;

//if(!isset($_GET["cron_key"]) OR $_GET["cron_key"] != $config->CronPass) die("Key error");

//if(!isset($_GET["type"])) die("Var type is empty");

$type = "sender";//strval($_GET["type"]);



# �������
$func = new func;

# ���� ������
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

switch($type){

	case "sender": include("cron_job/_sender.php"); break; // �������� �������������
	
	
	default: die("Type not exist"); break;
}

?>
