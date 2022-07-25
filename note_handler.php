<?php
require("header.php");

if(!isset($_POST['note'])){
	header("Location: /index.php");
}

$id_note = $_POST['note'];
$result = $bd->bdQuery("SELECT id, id_account, header, content FROM notes WHERE id = $id_note");
$row = mysqli_fetch_array($result) or header("Location: /index.php");

if($row['id_account'] != $account->id and $account->id_access != 2){
	header("Location: /index.php");
}

if(isset($_POST['edit'])){
	echo "
	<form action='/note_handler.php' method='POST'>
		<input type='hidden' name='note' value='{$row['id']}'>
		Заголовок: <input type='text' name='header' value='{$row['header']}'><br>
		Описание: <textarea name='content' placeholder='{$row['content']}' cols='100' rows='10'>{$row['content']}</textarea><br>
		<input type='submit' name='save' value='Сохранить'>
	</form>
	";
}elseif(isset($_POST['delete'])){
	$bd->bdQuery("DELETE FROM notes WHERE id = {$_POST['note']}");
	header("location: /note.php");
}elseif(isset($_POST['save'])){
	$header_note = $_POST['header'];
	$content_note = $_POST['content'];
	$id_note = $_POST['note'];
	$bd->bdQuery("UPDATE notes SET header = '$header_note', content = '$content_note' WHERE id = $id_note");
	header("location: /note.php/?note=$id_note");
}
?>