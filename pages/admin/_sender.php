<div class="login-container">
<div class="row">
<div class="login-form">

<?
include("inc/_admin_menu.php");
?>

<?PHP

if(isset($_POST["title"])){

$title = strval($_POST["title"]);
$mess = $func->TextClean($_POST["mess"]);

	if(strlen($title) > 3){
	
		if(strlen($mess) > 10){
		
		$db->Query("INSERT INTO db_sender (name, mess, date_add) VALUES ('$title','$mess','".time()."')");
		
		echo "<center><b>Рассылка поставлена в очередь на выполнение.</b></center><BR />";
		
		}else echo "<center><b>Сообщение должно быть больше 10 символов.</b></center><BR />";
	
	}else echo "<center><b>Заголовок должен быть больше 3 символов.</b></center><BR />";

}


?>

<script type="text/javascript" src="/js/editor/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		editor_deselector : "mceNoEditor",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright",
		
		theme_advanced_buttons2 : "styleselect,formatselect,fontselect,fontsizeselect,|,fullscreen,media,advhr",
		
		theme_advanced_buttons3 : "bullist,numlist,|,outdent,indent,blockquote,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons4 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell",
		theme_advanced_buttons5 : "",
		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		content_css : "editor/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		extended_valid_elements : "iframe[*]",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		},

		
		// Style formats
		style_formats : [

			{title : 'DEFAULT', inline : 'span', classes : 'text-content'}
		],
		
		
		// Enable translation mode
		translate_mode : true,
		language : "ru"
	});
</script>

<form action="" method="post" id="sender">
Заголовок сообщения:
<input type="text" name="title"/>
Текст сообщения:
<textarea name="tx"></textarea>
<BR />
<a class="button alert round disabled expand" href="javascript:with(document.getElementById('sender')){ submit(); }">Добавить</a>
</form>

<BR /><BR />

<?PHP
if(isset($_POST["del"])){

	$db->Query("DELETE FROM db_sender WHERE id = '".intval($_POST["del"])."'");	
	echo "<center><b>Рассылка удалена.</b></center><BR />";

}

$db->Query("SELECT * FROM db_sender ORDER BY id DESC");

if($db->NumRows() > 0){



?>
<table data-wow-delay="0.3s" class="flat-table flat-table-1 responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
<thead>
  <tr>
<th>ID</th>
<th>Название</th>
<th>Отправлено</th>
<th>Статус</th>
<th>Удалить</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?PHP

while($data = $db->FetchArray()){

?>
	<tr>
    <td><?=$data["id"]; ?></td>
    <td><?=$data["name"]; ?></td>
    <td><?=$data["sended"]; ?> шт.</td>
	<td><?=$data["status"] == 0 ? "Отправка" : "Завершено"; ?></td>
	<td>
		<form action="" method="post" id="delete">
			<input type="hidden" name="del" value="<?=$data["id"]; ?>" />
			<a class="button alert round disabled expand" href="javascript:with(document.getElementById('delete')){ submit(); }"><i class="fa fa-times"></i></a>
		</form>
	</td>
  	</tr>
<?PHP

}

?>
</tr>
</tbody>
</table>

<BR />

<?PHP

}else echo "<center><b>Рассылок нет.</b></center><BR />";

?>

</div>
</div>
</div>

<hr>