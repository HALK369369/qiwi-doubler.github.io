<?php
class isender{
    
	var $Hosts = "";
	
	/*======================================================================*\
	Function:	__construct
	Descriiption: Конструктор класса
	\*======================================================================*/
	function __construct(){
	
		$this->Hosts = str_replace("www.","",$_SERVER['HTTP_HOST']);
	
	}
	
	/*======================================================================*\
	Function:	SendRegKey
	Descriiption: Отправляет регистрационный ключ
	\*======================================================================*/
	function SendRegKey($mail, $key){
	
		$text = "На ваш E-Mail была запрошена ссылка для регистрации в системе \"".$this->Hosts."\"<BR />";
		$text.= "Если вы не запрашивали ссылку, просто проигнорируйте это сообщение. <BR /><BR />";
		$text.= "Ссылка для регистрации: <a href='http://".$this->Hosts."/signup/key/{$key}'>";
		$text.= "http://".$this->Hosts."/signup/key/{$key}</a>";
		$subject = "Регистрация в системе \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	Recoverypassword
	Descriiption: Восстановление пароля
	\*======================================================================*/
	function Recoverypassword($login, $password, $mail){
	
		$text.= "Данные для входа в личный кабинет пользователя: <BR />";
		$text.= "<b>Логин:</b> {$login}<BR />";
		$text.= "<b>Пароль:</b> {$password}<BR />";
		$text.= "Ссылка для входа в кабинет: <a href='http://".$this->Hosts."/signup'></a>";
		$subject = "Восстановление забытого пароля в системе \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SendAfterReg
	Descriiption: Отправляет данные после регистрации
	\*======================================================================*/
	function SendAfterReg($login, $mail, $password){
	
		$text = "Благодарим вас за регистрацию в системе в системе \"".$this->Hosts."\"<BR />";
		$text.= "Ваши данные для входа в личный кабинет пользователя: <BR />";
		$text.= "<b>Логин:</b> {$login}<BR />";
		$text.= "<b>Пароль:</b> {$password}<BR />";
		$text.= "Ссылка для входа в кабинет: <a href='http://".$this->Hosts."/login'></a>";
		$subject = "Завершение регистрации в системе \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SetNewpassword
	Descriiption: Отправляет данные после смены пароля
	\*======================================================================*/
	function SetNewpassword($login, $password, $mail){
	
		$text = "В настройках вашего аккаунта был изменен пароль.<BR />";
		$text.= "Ваши новые данные для входа в личный кабинет пользователя: <BR />";
		$text.= "<b>Логин:</b> {$login}<BR />";
		$text.= "<b>Новый пароль:</b> {$password}<BR />";
		$text.= "Ссылка для входа в кабинет: <a href='http://".$this->Hosts."/login'></a>";
		$subject = "Смена пароля в системе \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	
	/*======================================================================*\
	Function:	Headers
	Descriiption: Создание заголовков письма
	\*======================================================================*/
	function Headers(){
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html; charset=Windows-1251\r\n";
	$headers.= "Date: ".date("m.d.Y (H:i:s)",time())."\r\n";
	$headers = 'From: support@dengi21.ru' . "\r\n" .
    'Reply-To: support@dengi21.ru' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

	
		return $headers;
	
	}
	
	/*======================================================================*\
	Function:	SendMail
	Descriiption: Отправитель
	\*======================================================================*/
	function SendMail($recipient, $subject, $message){
	
		$message .= "<BR />----------------------------------------------------
		<BR />Сообщение было выслано роботом, пожалуйста, не отвечайте на него!";
		return (mail($recipient, $subject, $message, $this->Headers())) ? true : false;
	
	}
	
	
	
}
?>