<?php
class Bd{
	public $host = "localhost";
	public $login = "";
	public $password = "";
	public $name = "";
	private $dbLink;
	
	public function __construct(){
		$this->dbLink = mysqli_connect($this->host, $this->login, $this->password, $this->name);
	}
	public function bdQuery($sql){
		$result = mysqli_query($this->dbLink, $sql);
		return $result;
	}
	public function login($userLogin, $userPassword){
		$result = $this->bdQuery("SELECT id, id_access, name FROM account WHERE login = '$userLogin' AND password = '$userPassword'");
		$row = mysqli_fetch_array($result);
		return $row;
	}
	public function getUserNotes($idUser){
		$result = $this->bdQuery("SELECT id, id_account, header, content FROM notes WHERE id_account = '$idUser'");
		while($row = mysqli_fetch_array($result)){
			$notes[] = new Notes($row['id'], $row['header'], $row['content'], $row['id_account']);
		}
		return $notes;
	}
	public function getNotes($page){
		if($page != 1){
			$page *= 10;
		}
		$maxPage = $page + 10;
		$result = $this->bdQuery("SELECT id, id_account, header, content FROM notes WHERE id >= $page AND id <= $maxPage");
		while($row = mysqli_fetch_array($result)){
			$notes[] = new Notes($row['id'], $row['header'], $row['content'], $row['id_account']);
		}
		return $notes;
	}
	public function __destruct(){
		mysqli_close($this->dbLink);
	}
}
?>