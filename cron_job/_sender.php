<?PHP
$db->Query("SELECT * FROM db_sender WHERE status = '0' ORDER BY id LIMIT 1");

if($db->NumRows() == 1){

$send_data = $db->FetchArray();

$page = $send_data["page"] * 50;

	$db->Query("SELECT * FROM db_users, db_users_ref WHERE db_users.id = db_users_ref.id ORDER BY db_users.id LIMIT {$page}, 50");
	
	
	
	if($db->NumRows() > 0){
		
		$sender = new isender;
				
		$all_send = 0;
		while($send = $db->FetchArray()){
			
			$arr_data = array("{!USER!}", "{!EMAIL!}", "{!PASSWORD!}", "{!REFERER!}", "{!REFERALS!}", "{!MONEY!}", "\n");
			$arr_data2 = array($send["user"], $send["email"], $send["password"], $send["referer"], $send["referals"], $send["money"], "<BR />");
			
			$send_data_text = str_replace($arr_data, $arr_data2, $send_data["mess"]);
			
			$sender -> SendMail($send["email"], $send_data["name"], $send_data_text);
			
			$all_send++;
		}
	
		$db->Query("UPDATE db_sender SET page = page +1, sended = sended + '$all_send' WHERE id = '".$send_data["id"]."'");
	
	} else $db->Query("UPDATE db_sender SET status = '1' WHERE id = '".$send_data["id"]."'");
	
}

?>