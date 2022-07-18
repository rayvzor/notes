<?php
require("classes/Bd.php");
require("classes/Notes.php");
require("classes/Account.php");
require("classes/User.php");
session_start();
if(isset($_SESSION['account'])){
	switch($_SERVER['SCRIPT_NAME']){
		//case "/logout.php":
			//session_destroy();
			//header("Refresh:0");
			//break;
		case "/login.php":
	    case "/registration.php":
			header("Location: index.php");
			break;
		default:
			$account = $_SESSION['account'];
	}
}else{
	if($_SERVER['SCRIPT_NAME'] != "/registration.php" AND $_SERVER['SCRIPT_NAME'] != "/login.php"){
		header("Location: login.php");
	}
}
?>