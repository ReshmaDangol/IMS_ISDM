<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION['valid']);
   
   echo 'You have cleaned session';
   header( "Location: login.php" );
?>