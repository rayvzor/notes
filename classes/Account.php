<?php
Class Account{
	public int $id;
	public int $id_access;
	public String $name;
	public $notes = Array();//Массив обьектов с заметками
	public function __construct($id, $id_access, $name){
		$this->id = $id;
		$this->id_access = $id_access;
		$this->name = $name;
	}
	public function getMyNotes(){
		$bd = new Bd();
		$this->notes = $bd->getUserNotes($this->id);
	}
}
?>