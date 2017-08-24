<?php
class isender{
    
	var $Hosts = "";
	
	/*======================================================================*\
	Function:	__construct
	Descriiption: ����������� ������
	\*======================================================================*/
	function __construct(){
	
		$this->Hosts = str_replace("www.","",$_SERVER['HTTP_HOST']);
	
	}
	
	/*======================================================================*\
	Function:	SendRegKey
	Descriiption: ���������� ��������������� ����
	\*======================================================================*/
	function SendRegKey($mail, $key){
	
		$text = "�� ��� E-Mail ���� ��������� ������ ��� ����������� � ������� \"".$this->Hosts."\"<BR />";
		$text.= "���� �� �� ����������� ������, ������ �������������� ��� ���������. <BR /><BR />";
		$text.= "������ ��� �����������: <a href='http://".$this->Hosts."/signup/key/{$key}'>";
		$text.= "http://".$this->Hosts."/signup/key/{$key}</a>";
		$subject = "����������� � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	Recoverypassword
	Descriiption: �������������� ������
	\*======================================================================*/
	function Recoverypassword($login, $password, $mail){
	
		$text.= "������ ��� ����� � ������ ������� ������������: <BR />";
		$text.= "<b>�����:</b> {$login}<BR />";
		$text.= "<b>������:</b> {$password}<BR />";
		$text.= "������ ��� ����� � �������: <a href='http://".$this->Hosts."/signup'></a>";
		$subject = "�������������� �������� ������ � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SendAfterReg
	Descriiption: ���������� ������ ����� �����������
	\*======================================================================*/
	function SendAfterReg($login, $mail, $password){
	
		$text = "���������� ��� �� ����������� � ������� � ������� \"".$this->Hosts."\"<BR />";
		$text.= "���� ������ ��� ����� � ������ ������� ������������: <BR />";
		$text.= "<b>�����:</b> {$login}<BR />";
		$text.= "<b>������:</b> {$password}<BR />";
		$text.= "������ ��� ����� � �������: <a href='http://".$this->Hosts."/login'></a>";
		$subject = "���������� ����������� � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SetNewpassword
	Descriiption: ���������� ������ ����� ����� ������
	\*======================================================================*/
	function SetNewpassword($login, $password, $mail){
	
		$text = "� ���������� ������ �������� ��� ������� ������.<BR />";
		$text.= "���� ����� ������ ��� ����� � ������ ������� ������������: <BR />";
		$text.= "<b>�����:</b> {$login}<BR />";
		$text.= "<b>����� ������:</b> {$password}<BR />";
		$text.= "������ ��� ����� � �������: <a href='http://".$this->Hosts."/login'></a>";
		$subject = "����� ������ � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	
	/*======================================================================*\
	Function:	Headers
	Descriiption: �������� ���������� ������
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
	Descriiption: �����������
	\*======================================================================*/
	function SendMail($recipient, $subject, $message){
	
		$message .= "<BR />----------------------------------------------------
		<BR />��������� ���� ������� �������, ����������, �� ��������� �� ����!";
		return (mail($recipient, $subject, $message, $this->Headers())) ? true : false;
	
	}
	
	
	
}
?>