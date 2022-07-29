<?php
require("header.php");
if(!isset($_GET['note'])){
	header("Location: index.php");
}
$data_note = $bd->getUserNote($_GET['note']) AND $data_note[0]->accessToNote($account) or header("Location: /index.php");

require("frontend_header.php");
echo "<center>";
echo "<div style='border: 3px solid black; background-color:Gainsboro'>";
echo "<h1>" . $data_note[0]->header . "</h1>";
echo "<p style='background-color:Tan'>" . $data_note[0]->content . "</p>";
$author = $bd->getDataAuthor($data_note[0]->author);
echo "Автор: " . $author['name'];
echo "
<form action='/note_handler.php' method='POST'>
	<input type='hidden' name='note' value='{$data_note[0]->id}'>
	<input style='background-color:green'  type='submit' name='edit' value='Редактировать'>
</form><br>
";
echo "
<form action='/note_handler.php' method='POST'>
	<input type='hidden' name='note' value='{$data_note[0]->id}'>
	<input style='background-color:red' type='submit' name='delete' value='Удалить'>
</form><br>
";
echo "</div>";
echo "<a href='/index.php'><<<</a>";
echo "</center>";
require("footer.php");
?>