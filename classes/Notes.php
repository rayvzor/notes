<?php
Class Notes{
	public $id;
	public $header;
	public $content;
	public $author;
	
	public function __construct($id, $header, $content, $author){
		$this->id = $id;
		$this->header = $header;
		$this->content = $content;
		$this->author = $author;
	}
}
?>