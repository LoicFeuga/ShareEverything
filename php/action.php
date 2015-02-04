
<?php
require_once('functions.php');
/*
 variable de retour
 qui sera complétée en fonction des données récupérée de la bdd
 la formation d'un tableau est conseillée
 Exemple : 
 //[0] = nom
 //[1] = prenom
 $result[0] = $variable1
 $result[1] = $variable2
*/
$result;
/*ini_set('display_errors', 'On');
error_reporting(E_ALL);*/

include 'classes/DataBase.php';

$pdo = new DataBase("laudtayq","root","localhost","");


switch($_['action']){

     case 'create_room':
          include 'classes/User.php';
          include 'classes/Room.php';

          $room = new Room($_['room'],$_['description'],$pdo);

          $room->insertRoom();
          //INSERT INTO de la room
          $room->setId($pdo->getDb()->lastInsertId());
          $token=md5(uniqid(rand(), true));
          $_COOKIE['token'] = $token; 
          $user = new User($token,$room->getId(),$pdo); 
          $user->insertUser();

          session_start();
          $_SESSION['pseudo'] = $_['pseudo'];
          $_SESSION['room'] = $_['room'];
          $result[0] = $_SESSION['pseudo'] ;
     break;

     case 'add_groupe':
     	include 'classes/Groupe.php';
     	include 'classes/User.php';
     	include 'classes/ListGroupe.php';

     	$user = new User($_COOKIE['startSpeedWay'],0,$pdo);

     	//Si l'utilisateur n'as pas encore fait de groupe
     	if($user->haveAlreadyListGroupe() == 0){
     		//On créé une liste de groupe 
     		$list_groupe = new ListGroupe($user->getId(),0,$pdo);
     		$list_groupe->createList(); 

               //Récupération de l'id l_groupe généré 
               $id_l_groupe = $pdo->getDb()->lastInsertId();

               //Mise à jour dans la table user du new id_l_groupe
               $user->updateIdLGroupe($id_l_groupe);

     		//On créé un groupe
	          $group = new Groupe($_['name'],0,$id_l_groupe,$pdo);
	     	$group->addGroupe();
	     	
               //Récupération de l'id groupe généré
               $i_g = $pdo->getDb()->lastInsertId();
	     	//On ajout ce groupe à cette list
	     	$list_groupe->addGroupe($i_g);

               $result[3]="haveAlreadyListGroupe";
	     	
     	}else{
               //##here
               
               $id = $user->getId();
               $user->setLGroupe($user->getLGroupe());

               $list_groupe = new ListGroupe($id,0,$pdo);

               //On créé un groupe
               $group = new Groupe($_['name'],0,$id_l_groupe,$pdo);
               $group->addGroupe();

               $result[2] = $id;

     	}
     	$result[0] = 1;
     break;

     case 'add_user':
     	include 'classes/User.php';
     	if(!isset($_COOKIE['startSpeedWay'])) {
	     	$speedWayAccount=md5(uniqid(rand(), true)); 
	     	$user = new User($speedWayAccount,0,$pdo);
	     	$user->addUser();
		}else{
			$speedWayAccount = $_COOKIE['startSpeedWay'];
		}
        $result[0] = $speedWayAccount;
     break;

     default:
         $result ="Aucune action définie";
     break;

}


echo '('.json_encode($result).')';

?>

