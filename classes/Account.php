<?php
Class Account{
	public int $id;
	public String $name;
	public Array $notes = Array();//Массив обьектов с заметками
	public function __construct($id, $name){
		$this->id = $id;
		$this->name = $name;
	}
}
?>