<?php
require("header.php");
require("frontend_header.php");
echo "Вы зашли как: [" . get_class($account) . "]" . $account->name . " <a href='logout.php'>Выход</a>";
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
	echo "<a href=''>" . $note->header . "</a>";
	echo "<p>" . $note->content . "</p>";
	echo "ID автора: " . $note->author . "";
	echo "<br>";
}
require("footer.php");
?>