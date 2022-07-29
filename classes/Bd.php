<?php
class Bd{
	public $host = "localhost";
	public $login = "host1375131_notes";
	public $password = "notes";
	public $name = "host1375131_note";
	private $dbLink;
	
	public function __construct(){
		$this->dbLink = mysqli_connect($this->host, $this->login, $this->password, $this->name);
	}
	public function getDataAuthor($idAuthor){
		$result = $this->bdQuery("SELECT id, id_access, name FROM account WHERE id = $idAuthor");
		$dataAuthor = mysqli_fetch_array($result);
		return $dataAuthor;
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
	public function newUser($dataUser){
		$name = $dataUser['name'];
		$login = $dataUser['login'];
		$password = $dataUser['password'];
		$this->bdQuery("INSERT INTO account (name, login, password) VALUES ('$name', '$login', '$password')");
		return mysqli_insert_id($this->dbLink);
	}
	public function getUserNotes($idUser){
		$result = $this->bdQuery("SELECT id, id_account, header, content FROM notes WHERE id_account = '$idUser' ORDER BY id DESC");
		return $this->fetchResult($result);
	}
	public function getUserNote($idNote){
		$result = $this->bdQuery("SELECT id, id_account, header, content FROM notes WHERE id = '$idNote'");
		return $this->fetchResult($result);
	}
	public function getNotes(){
		$result = $this->bdQuery("SELECT id, id_account, header, content FROM notes ORDER BY id DESC");
		return $this->fetchResult($result);
	}
	public function deleteNote($idNote){
		$this->bdQuery("DELETE FROM notes WHERE id = $idNote");
	}
	public function saveNote($note){
		$this->bdQuery("UPDATE notes SET header = '{$note->header}', content = '{$note->content}' WHERE id = {$note->id}");
	}
	public function fetchResult($result){
		while($row = mysqli_fetch_array($result)){
			$notes[] = new Notes($row['id'], $row['header'], $row['content'], $row['id_account']);
		}
		if(isset($notes)){
			return $notes;
		}else{
			return false;
		}
	}
	public function __destruct(){
		mysqli_close($this->dbLink);
	}
}
?>