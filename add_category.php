<?php
require_once ("database.php");

//get the values from the form
$category_name= filter_input(INPUT_POST, "category_name");
if (!isset($category_name)) {
    include ("add_category_form.php");
    exit();
}

$query = "insert into categories 
    (categoryName)"
        ." VALUES 
        (:np_category_name)";
$statement = $db->prepare($query);
$statement->bindValue(":np_category_name",$category_name);
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
         <?php include("include/header.php");?>
        <header><h1>Product Manager</h1></header>
        <h1>Add category</h1>
        category Added!!
         <a href="editor.php">back</a>
        
    </body>
</html>

