
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

  session_start();

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

          $_SESSION['pseudo'] = $_['pseudo'];
          $_SESSION['room'] = $_['room'];
          $result[0] = $_SESSION['pseudo'] ;
     break;

     case 'join_room':
          include 'classes/User.php';
          include 'classes/Room.php';


          $room = new Room($_['room'],$_['room'],$pdo);

          if($room->exist() == 1){
               $room->getRoom();
               $token=md5(uniqid(rand(), true));
               $_COOKIE['token'] = $token; 
               $user = new User($token, $room->getId(),$pdo);
               $user->updateRoom($room->getId());
               $_SESSION['pseudo'] = $_['pseudo'];
               $_SESSION['room'] = $_['room'];
               $result[1] = $_SESSION['room'];
          }

          $result[0] = $room->exist();
     break;


     default:
         $result ="Aucune action définie";
     break;

}


echo '('.json_encode($result).')';

?>

