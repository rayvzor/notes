<?php
require("header.php");

if(!isset($_POST['note'])){
	header("Location: /index.php");
}

$data_note = $bd->getUserNote($_POST['note']) AND $data_note[0]->accessToNote($account) or header("Location: /index.php");

if(isset($_POST['edit'])){
	require("frontend_header.php");
	echo "
	<form action='/note_handler.php' method='POST'>
		<input type='hidden' name='note' value='{$data_note[0]->id}'>
		Заголовок: <input type='text' name='header' value='{$data_note[0]->header}'><br>
		Описание: <textarea name='content' placeholder='{$data_note[0]->content}' cols='100' rows='10'>{$data_note[0]->content}</textarea><br>
		<input type='submit' name='save' value='Сохранить'>
	</form>
	";
}elseif(isset($_POST['delete'])){
	$bd->deleteNote($data_note[0]->id);
	header("location: /note.php");
}elseif(isset($_POST['save'])){
	$data_note[0]->header = $_POST['header'];
	$data_note[0]->content = $_POST['content'];
	$bd->saveNote($data_note[0]);
	header("location: /note.php/?note={$data_note[0]->id}");
}
?>