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

	public function exist(){
		$req = $this->pdo->queryOne("SELECT * FROM se_room WHERE name = '".$this->name."' ");
		if($req->id != 0 && $req !=NULL){
			return 1;
		}else{
			return 0;
		}
	}

	public function getRoom(){
		$req = $this->pdo->queryOne("SELECT * FROM se_room WHERE name = '".$this->name."' ");
		$this->id = $req->id;
		$this->description = $req->description;

	}

}

?>