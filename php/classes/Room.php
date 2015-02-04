<?php

class Room{
	private $id;
	private $name;
	private $description;
	private $pdo;

	public function __construct($name ="no_name", $description = "no_description",$pdo){
		$this->name = $name;
		$this->description = $description;
		$this->pdo = $pdo;
	}

	public function insertRoom(){
		$this->pdo->execute("INSERT INTO se_room (name, description) VALUES ('".$this->name."', '".$this->description."') ");
		//$this->id = $pdo->getDb()->lastInsertId();		
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}

}

?>