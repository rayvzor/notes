<?php
require("header.php");
if(!empty($_POST['login']) AND !empty($_POST['password'])){
	$login = $_POST['login'];
	$password = $_POST['password'];
	$row = $bd->login($login, $password);
	if(isset($row['id'])){
		switch($row['id_access']){
			case '1':
				$_SESSION['account'] = new User($row['id'], $row['id_access'], $row['name']);
			break;
			case "2":
				$_SESSION['account'] = new Admin($row['id'], $row['id_access'], $row['name']);
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
	<input required style='width:200px; height:25px;' type='text' name='login' placeholder='Логин'><br>
	<input required style='width:200px; height:25px;'  type='text' name='password' placeholder='Пароль'><br>
	<input style='width:115px; height:25px;'  type='submit' value='Вход'>
	<a href='/registration.php'>Регистрация</a>
</form>
";
require("footer.php");
?>