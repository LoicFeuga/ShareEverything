
<?php

   function secure($string){
	    return htmlentities(stripslashes($string),NULL,'UTF-8');
   }


   
      $_=array();
      foreach ($_POST as $key => $val) {
          $_[$key]=secure($val);
      }
      foreach ($_GET as $key => $val) {
          $_[$key]=secure($val);
      }

?>

