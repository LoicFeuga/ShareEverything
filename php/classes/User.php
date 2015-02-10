<?php

class User{

	private $id;
	private $token;
	private $pseudo;
	private $id_room;
	private $pdo;

	public function __construct($token = "",$pseudo="", $id_room = 0,$pdo){
		$this->token = $token;
		$this->id_room = $id_room;
		$this->pseudo = $pseudo;
		$this->pdo = $pdo;
	}

	public function insertUser(){
		$this->pdo->execute("INSERT INTO se_user ($token, $id_room,$pseudo) VALUES ('".$this->token."', '".$this->id_room."' , '".$this->pseudo."') ");

	}

	public function haveAlreadyRoom(){
		$user = $this->pdo->queryOne("SELECT * FROM se_user WHERE token = '".$this->token."' ");
		return $user->id_room;
	}

	public function getId(){
		$id = $this->pdo->queryOne("SELECT * FROM se_user WHERE token ='".$this->token."' ");
		return $id->id;
	}

	public function getRoom(){
		$listgroupe = $this->pdo->queryOne("SELECT * FROM se_user WHERE token ='".$this->token."' ");
		return $listgroupe->id_room;
	}

	public function setRoom($id_room){
		$this->id_room = $id_room;
	}

	public function updateRoom($id){
		$this->pdo->execute("UPDATE se_user SET id_room = '".$id."' WHERE token = '".$this->token."'");
	}

	public function setUserFromBDD(){
		$req = $this->pdo->queryOne("SELECT * FROM se_user WHERE token = '".$this->token."' ");

		$this->id = $req->id;
		$this->token = $req->token;
		$this->id_room = $req->id_room;
	}

	public function setUserFromBDDPseudo(){
		$req = $this->pdo->queryOne("SELECT * FROM se_user WHERE pseudo = '".$this->pseudo."' ");

		$this->id = $req->id;
		$this->token = $req->token;
		$this->id_room = $req->id_room;
	}

}

?>