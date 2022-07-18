<?php
require("header.php");
if(!empty($_POST['login']) AND !empty($_POST['password'])){
	$login = $_POST['login'];
	$password = $_POST['password'];
	$result = $bd->bdQuery("SELECT id, name FROM Account WHERE login = $login AND password = $password");
	$row = mysqli_fetch_array($result);
	if(isset($row['id'])){
		$_SESSION['account'] = new User($row['id'], $row['name']);
		header("location: index.php");
	}else{
		echo "Не правильный логин или пароль";
	}
}
require("frontend_header.php");
echo "
<form action='login.php' method='POST'>
	Логин:<input type='text' name='login'>
	Пароль:<input type='text' name='password'>
	<input type='submit' value='Вход'>
</form>
";
require("footer.php");
?>