<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<title></title>
</head>
<body>
<?php
if(isset($accessName)){
	echo "Вы зашли как: [" . $accessName . "]" . $account->name . " <a href='logout.php'>Выход</a>";
}
?>