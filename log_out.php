
<?php
   session_start();
   unset($_SESSION["admin"]);
   unset($_SESSION["log_on"]);
   
   header("location: index.php");
?>
