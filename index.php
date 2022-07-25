<?php
require("header.php");
if(!empty($_POST['header']) or !empty($_POST['content'])){
	$header_note = strip_tags($_POST['header']);
	$content_note = strip_tags($_POST['content']);
	$bd->bdQuery("INSERT INTO notes (id_account, header, content) VALUES ({$account->id}, '$header_note', '$content_note')");
	header("Location: /index.php");
}
require("frontend_header.php");
echo "
	<form action='/index.php' method='POST'>
		<input type='text' name='header' placeholder='Заголовок'><br>
		<textarea name='content' placeholder='Описание' cols='50' rows='7'></textarea><br>
		<input type='submit' name='add' value='Добавить заметку'>
	</form>
	";
echo "
<h1>Ваши заметки:</h1>
";
if(get_class($account) == "Admin"){
	$page = 1;
	$account->getNotes($page);
}else{
	$account->getMyNotes();
}
foreach($account->notes as $note){
	$id_note = $note->id;
	echo "<b><a href='note.php/?note=$id_note'>" . $note->header . "</a></b>";
	echo "<p style='border: 1px solid red'>" . mb_strimwidth($note->content, 0, 150, "<a href='note.php/?note=$id_note'>...</a>") . "</p>";
	echo "ID автора: " . $note->author . "";
	echo "<br>";
	echo "=====================<br>";
}
require("footer.php");
?>