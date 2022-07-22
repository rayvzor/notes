<?php
class Admin extends Account{
	public function getNotes($page){
		$bd = new Bd();
		$this->notes = $bd->getNotes($page);
	}
}
?>