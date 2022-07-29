<?php
class Admin extends Account{
	public function getNotes(){
		$bd = new Bd();
		$this->notes = $bd->getNotes();
	}
}
?>