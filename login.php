<?php
require("header.php");
if(!empty($_POST['login']) AND !empty($_POST['password'])){
	$login = $_POST['login'];
	$password = $_POST['password'];
	$row = $bd->login($login, $password);
	if(isset($row['id'])){
		switch($row['id_access']){
			case '1':
				$_SESSION['account'] = new User($row['id'], $row['name']);
			break;
			case "2":
				$_SESSION['account'] = new Admin($row['id'], $row['name']);
			break;
		}
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