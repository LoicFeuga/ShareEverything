<?php

class Tchat{
	private $id;
	private $text;
	private $pseudo;
	private $pdo;

	public function __construct($id, $pdo){
		$this->id = $id;
		$this->pdo = $pdo;
	}

	public function createTchat(){
		$req = $this->pdo->execute("INSERT INTO se_tchat (id, text, pseudo, date) VALUES ( '".$this->id."', ' ', ' ', ".time().")");
		$this->id = $this->pdo->getDb()->lastInsertId();
	}

	public function getId(){
		return $this->id;
	}

	public function sendMessage($text,$pseudo){
		$req = $this->pdo->execute("INSERT INTO se_tchat (id, text, pseudo,date) VALUES ( '".$this->id."', '".$text."', '".$pseudo."', ".time().")");
	}


	public function getAllMessage(){
		$req = $this->pdo->query("SELECT * FROM se_tchat WHERE id = '".$this->id."' ORDER BY date desc LIMIT 10 ");

		return $req;
	}
}
?>