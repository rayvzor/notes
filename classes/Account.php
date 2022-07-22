<?php
Class Account{
	public int $id;
	public String $name;
	public Array $notes = Array();//Массив обьектов с заметками
	public function __construct($id, $name){
		$this->id = $id;
		$this->name = $name;
	}
	public function getMyNotes(){
		$bd = new Bd();
		$this->notes = $bd->getUserNotes($this->id);
	}
}
?>