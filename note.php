<?php
require("header.php");
if(!isset($_GET['note'])){
	header("Location: index.php");
}
$id_note = $_GET['note'];
$result = $bd->bdQuery("SELECT id, id_account, header, content FROM notes WHERE id = $id_note");
$row = mysqli_fetch_array($result) or header("Location: /index.php");
if($row['id_account'] != $account->id and $account->id_access != 2){
	header("Location: /index.php");
}
require("frontend_header.php");
echo "<center>";
echo "<h1>" . $row['header'] . "</h1>";
echo "<p>" . $row['content'] . "</p>";
echo "
<form action='/note_handler.php' method='POST'>
	<input type='hidden' name='note' value='{$row['id']}'>
	<input type='submit' name='edit' value='Редактировать'>
</form>
";
echo "
<form action='/note_handler.php' method='POST'>
	<input type='hidden' name='note' value='{$row['id']}'>
	<input type='submit' name='delete' value='Удалить'>
</form>
";
echo "<a href='/index.php'><<<</a>";
echo "</center>";
require("footer.php");
?>