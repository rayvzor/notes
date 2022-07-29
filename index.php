<?php
require("header.php");
if(!empty($_POST['header']) or !empty($_POST['content'])){
	$header_note = strip_tags($_POST['header']);
	$content_note = strip_tags($_POST['content']);
	if($header_note == ""){$header_note = 'Заметка ' . date('d.m.Y');}
	$bd->bdQuery("INSERT INTO notes (id_account, header, content) VALUES ({$account->id}, '$header_note', '$content_note')");
	header("Location: /index.php");
}
require("frontend_header.php");
echo "
	<form action='/index.php' method='POST'>
		<input style='width:382px; height:25px;'   type='text' name='header' placeholder='Заголовок'><br>
		<textarea required name='content' placeholder='Описание' cols='50' rows='7'></textarea><br>
		<input style='width:390px; height:30px;'  type='submit' name='add' value='Добавить заметку'>
	</form>
	";
echo "
<h1>Ваши заметки:</h1>
";
if(get_class($account) == "Admin"){
	$account->getNotes();
}else{
			$account->getMyNotes();
}
if(is_array($account->notes)){
	foreach($account->notes as $note){
		$author = $bd->getDataAuthor($note->author);
		$id_note = $note->id;
		echo "<div style='border: 3px solid black; width: 500px; background-color:Gainsboro'>";
		echo "<h3><b><a href='note.php/?note=$id_note'>" . $note->header . "</a></b></h3>";
		echo "<p style='background-color:Tan'>" . mb_strimwidth($note->content, 0, 150, "	<a href='note.php/?note=$id_note'>...</a>") . "</p>";
		echo "Автор: " . $author['name'] . "";
		echo "<br>";
		echo "</div>";
		echo "<br>";
	}
}

require("footer.php");
?>