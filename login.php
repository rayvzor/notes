<?php
require("header.php");
if(!empty($_POST['login']) AND !empty($_POST['password'])){
	if(true){
		$_SESSION['account'] = new User(1, 'Андрей');
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