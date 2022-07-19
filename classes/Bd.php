<?php
class Bd{
	public $host = "";
	public $login = "";
	public $password = "";
	private $link;
	
	public function __construct(){
		$this->link = mysqli_connect($this->host, $this->login, $this->password);
	}
	public function bdQuery(String $sql){
		$result = mysqli_query($this->link, $sql);
		return $result;
	}
	public function __destruct(){
		mysqli_close($this->link);
	}
}
?>