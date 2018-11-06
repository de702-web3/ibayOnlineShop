<?php
require_once ("configuration.php");

//get the values from the form
$email= filter_input(INPUT_POST, "email");
if (!isset($email)) {
    include ("clothing.php");
    exit();
}

$query = "insert into sub_list
    (email)"
        ."VALUES 
        (:np_email)";
$statement = $db->prepare($query);
$statement->bindValue(":np_email",$email);

$statement ->execute();
$statement->closeCursor();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header><h1>Thx for signing up!</h1></header>
      
   
        <p>click  <a href="clothing.php">back</a> to continue your shopping,enjoy :D</p> 
        
    </body>
</html>

