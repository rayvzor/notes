<?php
class Bd{
	public $host;
	public $login;
	public $password;
	
	public function __construct($host, $login, $password){
		$this->host = $host;
		$this->login = $login;
		$this->password = $password;
	}
	public function bdQuery(String $sql){
		$link = mysqli_connect($this->host, $this->login, $this->password);
		$result = mysqli_query($link, $sql);
		mysqli_close($link);
		return $result;
	}
}
?>