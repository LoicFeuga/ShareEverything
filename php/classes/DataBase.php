<?php
/**
*		Class DataBase,
*
* Elle permet de se connecter à un serveur distant
*
*	
* Exemple d'utilisation :
*	Partie Connexion : 
*		- require_once('./php/classes/DataBase.php');
*		- $pdo = new DataBase(); // permet de se connecter à une table test en localhost user=root, password =''
*		- $pdo = new DataBase($nom_base,$nom_user,$nom_hote,$password);
*	Partie Utilisation : 
*		- $data = $pdo->queryOne('SELECT * from test'); // permet de récupérer la première ligne
*		  - echo $data->name;
*		- $data = $pdo->query('SELECT * from test');
*		  - echo $date[0]->name;
*
*
* Notes des versions : 
*
* Version 0 :
*	Edition 0 : 
*		Mise à jour 1 : +function query
*						+function queryOne
*						+function getFirst
*
*						
* Version initiale : Connection base de données 
*					 +functions de tests 
*
*	@version version V0.0.0
*	@author Veratyr
*
**/
class DataBase{
	private $db_name;
	private $db_user;
	private $db_password;
	private $db_host;
	private $db;
	private $datas;


	public function __construct($db_name ='test', $db_user = 'root', $db_host='localhost', $db_password =''){
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
		$this->db_host = $db_host;
	}

	/**
	*	Function getPDO
	*	  Permet de renvoyer une new PDO 
	*
	**/
	private function getPDO(){
		if($this->db == null){
			$db = new PDO( 'mysql:host='.$this->db_host.';dbname='.$this->db_name.'', $this->db_user, $this->db_password);
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->db = $db;
		}
		return $this->db;
	}


	/**
	*	Function query
	*	  Permet d'exécuter une SQL query passer en paramètre
	**/
	public function query($statement){
		$req = $this->getPDO()->query($statement);
		$datas = $req->fetchAll(PDO::FETCH_OBJ);
		return $datas;
	}

	/**
	*	Function execute
	*	  Permet d'exécuter une SQL query passer en paramètre
	**/
	public function execute($statement){
		$req = $this->getPDO()->query($statement);
		//$req->execute();
		//$datas = $req->fetchAll(PDO::FETCH_OBJ);
		//return $datas;
	}

	/**
	*	Function queryOne
	*	  Permet d'exécuter une SQL query passer en paramètre et de renvoyer que le premier 
	*	  résultat
	**/
	public function queryOne($statement){
		$req = $this->getPDO()->query($statement);
		$datas = $req->fetchAll(PDO::FETCH_OBJ);
		return $datas[0];
	}

	/**
	*	Function getFirst
	*	  Retourne le [0] d'une query
	*
	**/
	public function getFirst($query){
		return $query[0];
	}




	/**
	*	Function getLocalhostPDO
	*	  Permet de définir une $db vers localhost 
	*
	**/
	private function getLocalhostPDO(){
		$dns = 'mysql:host=localhost;dbname=test';
		$user = 'root';
		$password = '';
		$db = new PDO( $dns, $user, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$this->db = $db;
		return $db;
	}


	/**
	*	Function getTest
	*	  Récupère une table test d'une BD test dans localhost, root, '', afin de récupérer un name, slug, 
	*	  pour tester 
	*
	**/
	public function getTest(){
		$req = $this->getLocalhostPDO()->query('SELECT * FROM test');
		$datas = $req->fetch();
		return $datas;
	}







	/**
	* Gets the value of db_name.
	*
	* @return mixed
	*/
	public function getDbName()
	{
		return $this->db_name;
	}

	/**
	* Gets the value of db_user.
	*
	* @return mixed
	*/
	public function getDbUser()
	{
		return $this->db_user;
	}

	/**
	* Gets the value of db_password.
	*
	* @return mixed
	*/
	public function getDbPassword()
	{
		return $this->db_password;
	}

	/**
	* Gets the value of db_host.
	*
	* @return mixed
	*/
	public function getDbHost()
	{
		return $this->db_host;
	}

	/**
	* Gets the value of db.
	*
	* @return mixed
	*/
	public function getDb()
	{
		$this->getPDO();
		return $this->db;
	}
}