
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
          include 'classes/Tchat.php';

          $room = new Room($_['room'],$_['description'],$pdo);

          $room->insertRoom();

          //SELECT * AND set 
          $room->setRoomFromBDD();
          $room->createTchat();
          
          $tchat = new Tchat($room->getIdTchat(), $pdo);
          $tchat->createTchat();
        
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
          include 'classes/Tchat.php';


          $room = new Room($_['room'],$_['room'],$pdo);

          if($room->exist() == 1){
               $room->setRoomFromBDD();
               $token=md5(uniqid(rand(), true));
               $_COOKIE['token'] = $token; 

               $_SESSION['pseudo'] = $_['pseudo'];
               $_SESSION['$room'] = $_['room'];
               $pseudo = $_SESSION['pseudo'];

               $user = new User($token,$pseudo, $room->getId(),$pdo);
               $user->updateRoom($room->getId());

               $tchat = new Tchat($room->getIdTchat(), $pdo);


               $result[1] = $_SESSION['room'];
               $result[2] = $tchat->getId();
          }

          $result[0] = $room->exist();
     break;


     case 'send_message':
          include 'classes/User.php';
          include 'classes/Room.php';
          include 'classes/Tchat.php';


          $room = new Room($_['room'],$_['room'],$pdo);

          if($room->exist() == 1){
               $room->setRoomFromBDD();
               $pseudo = $_SESSION['pseudo'];


               $user = new User(0,$pseudo, $room->getId(),$pdo);

               $user->setUserFromBDDPseudo();

               $tchat = new Tchat($room->getIdTchat(), $pdo);

               $tchat->sendMessage($_['message'],$_['pseudo']);
               $result[0] = 1;
          }

     break;

     case 'get_message':
          include 'classes/User.php';
          include 'classes/Room.php';
          include 'classes/Tchat.php';

           $room = new Room($_['room'],$_['room'],$pdo);

            if($room->exist() == 1){
               $room->setRoomFromBDD();
               $pseudo = $_SESSION['pseudo'];

               $tchat = new Tchat($room->getIdTchat(), $pdo  );

               $data = $tchat->getAllMessage();

               $result[0] = "";          
               for($i = count($data) - 1 ; $i>=0;$i--){
                    if($data[$i]->date > time() - 1000){
                    $result[0].="<p>[".gmdate("H:i:s", $data[$i]->date)."]  ".$data[$i]->pseudo ." : ".$data[$i]->text." </p></br>";
               }
          }

          }
     break;


     default:
         $result ="Aucune action définie";
     break;

}


echo '('.json_encode($result).')';

?>

