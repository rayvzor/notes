<?php
class Bd{
	public $host = "";
	public $login = "";
	public $password = "";
	public $name = "";
	private $dbLink;
	
	public function __construct(){
		$this->dbLink = mysqli_connect($this->host, $this->login, $this->password, $this->password);
	}
	public function bdQuery(String $sql){
		$result = mysqli_query($this->dbLink, $sql);
		return $result;
	}
	public function __destruct(){
		mysqli_close($this->dbLink);
	}
}
?>