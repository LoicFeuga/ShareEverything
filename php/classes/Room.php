<?php

class Room{
	private $id;
	private $name;
	private $description;
	private $id_tchat;
	private $pdo;

	public function __construct($name ="no_name", $description = "no_description",$pdo){
		$this->name = $name;
		$this->description = $description;
		$this->pdo = $pdo;
	}



	public function insertRoom(){
		$this->pdo->execute("INSERT INTO se_room (name, description) VALUES ('".$this->name."', '".$this->description."') ");
	}

	public function createTchat(){
		$req = $this->pdo->queryOne("SELECT MAX(id_tchat) AS id_tchat FROM se_room ");
		$this->id_tchat = $req->id_tchat;
		$this->id_tchat++;
		$this->pdo->execute("UPDATE se_room SET id_tchat = '".$this->id_tchat."' WHERE name= '".$this->name."' ");
	}

	public function getId(){
		return $this->id;
	}

	public function getIdTchat(){
		return $this->id_tchat;
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

	public function setRoomFromBDD(){
		$req = $this->pdo->queryOne("SELECT * FROM se_room WHERE name = '".$this->name."' ");

		$this->id = $req->id;
		$this->description = $req->description;
		$this->id_tchat = $req->id_tchat;
		$this->name = $req->name;

	}

}

?>