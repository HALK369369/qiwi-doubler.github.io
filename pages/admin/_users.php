<?php 

if ( !isset( $_GET["action"] ) ) $_GET["action"] = "showlist";  
  
switch ( $_GET["action"] ) 
{ 
  case "showlist":    // Список всех записей в таблице БД
    show_list(); break; 
  case "addform":     // Форма для добавления новой записи 
    get_add_item_form(); break; 
  case "add":         // Добавить новую запись в таблицу БД
    add_item(); break;
  case "editform":    // Форма для редактирования записи 
    get_edit_item_form(); break; 
  case "update":      // Обновить запись в таблице БД
    update_item(); break; 
  case "delete":      // Удалить запись в таблице БД
    delete_item(); break;
  default: 
    show_list(); 
}

// Функция выводит список всех записей в таблице БД
function show_list() 
{ 
  $query = 'SELECT id, login, pm, referer FROM db_users WHERE 1'; 
  $res = mysql_query( $query ); 
  echo '<h2>Список</h2>'; 
  echo '<table border="1" cellpadding="2" cellspacing="0">'; 
  echo '<tr><th>ID</th><th>Наименование</th><th>Описание</th><th>Ред.</th><th>Удл.</th></tr>'; 
  while ( $item = mysql_fetch_array( $res ) ) 
  { 
    echo '<tr>'; 
    echo '<td>'.$item['id'].'</td>'; 
    echo '<td>'.$item['login'].'</td>'; 
    echo '<td>'.$item['pm'].'</td>'; 
	echo '<td>'.$item['referer'].'</td>'; 
    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=editform&id='.$item['id'].'">Ред.</a></td>'; 
    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=delete&id='.$item['id'].'">Удл.</a></td>'; 
    echo '</tr>'; 
  } 
  echo '</table>';
  echo '<p><a href="'.$_SERVER['PHP_SELF'].'?action=addform">Добавить</a></p>';  
} 

// Функция формирует форму для добавления записи в таблице БД 
function get_add_item_form() 
{ 
  echo '<h2>Добавить</h2>';  
  echo '<form name="addform" action="'.$_SERVER['PHP_SELF'].'?action=add" method="POST">'; 
  echo '<table>'; 
  echo '<tr>'; 
  echo '<td>Пользователь</td>'; 
  echo '<td><input type="text" name="login" value="" /></td>'; 
  echo '</tr>'; 
  echo '<tr>'; 
  echo '<td>Кошелек</td>'; 
  echo '<td><input type="text" name="pm" value="" /></td>'; 
  echo '</tr>'; 
  echo '<tr>'; 
  echo '<td>Спонсор</td>'; 
  echo '<td><input type="text" name="referer" value="" /></td>'; 
  echo '</tr>'; 
  echo '<tr>';   
  echo '<td><input type="submit" value="Сохранить"></td>'; 
  echo '<td><button type="button" onClick="history.back();">Отменить</button></td>'; 
  echo '</tr>'; 
  echo '</table>'; 
  echo '</form>'; 
}

// Функция добавляет новую запись в таблицу БД  
function add_item() 
{ 
  $login = mysql_escape_string( $_POST['login'] ); 
  $pm = mysql_escape_string( $_POST['pm'] ); 
  $referer = mysql_escape_string( $_POST['referer'] ); 
  $query = "INSERT INTO db_users (login, pm, referer) VALUES ('".$login."', '".$pm."', '".$referer."');"; 
  mysql_query ( $query ); 
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
}

// Функция формирует форму для редактирования записи в таблице БД 
function get_edit_item_form() 
{ 
  echo '<h2>Редактировать</h2>'; 
  $query = 'SELECT id, login, pm, referer FROM db_users WHERE id='.$_GET['id']; 
  $res = mysql_query( $query ); 
  $item = mysql_fetch_array( $res ); 
  echo '<form name="editform" action="'.$_SERVER['PHP_SELF'].'?action=update&id='.$_GET['id'].'" method="POST">'; 
  echo '<table>'; 
  echo '<tr>'; 
  echo '<td>Пользователь</td>'; 
  echo '<td><input type="text" name="login" value="'.$item['login'].'"></td>'; 
  echo '</tr>'; 
  echo '<tr>'; 
  echo '<td>Кошелек</td>'; 
  echo '<td><input type="text" name="pm" value="'.$item['pm'].'"></td>'; 
  echo '</tr>'; 
  echo '<tr>';  
  echo '<td>Спонсор</td>'; 
  echo '<td><input type="text" name="referer" value="'.$item['referer'].'"></td>'; 
  echo '</tr>'; 
  echo '<tr>'; 
  echo '<td><input type="submit" value="Сохранить"></td>'; 
  echo '<td><button type="button" onClick="history.back();">Отменить</button></td>'; 
  echo '</tr>'; 
  echo '</table>'; 
  echo '</form>'; 
} 

// Функция обновляет запись в таблице БД  
function update_item() 
{ 
  $login = mysql_escape_string( $_POST['login'] ); 
  $pm = mysql_escape_string( $_POST['pm'] ); 
  $referer = mysql_escape_string( $_POST['referer'] );
  $query = "UPDATE db_users SET login='".$login."', pm='".$pm."', referer='".$referer."'
            WHERE id=".$_GET['id']; 
  mysql_query ( $query ); 
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
} 

// Функция удаляет запись в таблице БД 
function delete_item() 
{ 
  $query = "DELETE FROM db_users WHERE id=".$_GET['id']; 
  mysql_query ( $query ); 
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
} 
  
?>