<?php
require("header.php");
if(!empty($_POST['login']) AND !empty($_POST['password'])){
	$login = $_POST['login'];
	$password = $_POST['password'];
	$row = $bd->login($login, $password);
	if(isset($row['id'])){
		echo "Пользователь уже сущевствует";
	}else{
		$id_user = $bd->newUser($_POST);
		$_SESSION['account'] = new User($id_user, 1, $_POST['name']);
		header("location: index.php");
	}
}
require("frontend_header.php");
echo "
<form action='registration.php' method='POST'>
	<input required style='width:220px; height:25px;'  type='text' name='name' placeholder='Имя'><br>
	<input required style='width:220px; height:25px;'  type='text' name='login' placeholder='Логин'><br>
	<input required style='width:220px; height:25px;'  type='text' name='password' placeholder='Пароль'><br>
	<input style='width:105px; height:25px;'  type='submit' value='Регистрация'>
	<a href='/login.php'>Уже есть аккаунт</a>
</form>
";
require("footer.php");
?>