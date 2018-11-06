<?php
require_once ("database.php");

//get the values from the form
$category_id= filter_input(INPUT_POST, "category_id");
if (!isset($category_id)) {
    include ("add_product_form.php");
    exit();
}
$code= filter_input(INPUT_POST, "code");
$name= filter_input(INPUT_POST, "name");
$price= filter_input(INPUT_POST, "price");


$query = "insert into products 
    (categoryID,productCode,productName,listPrice)"
        ." VALUES 
        (:np_category_id, :np_code, :np_name, :np_price)";
$statement = $db->prepare($query);
$statement->bindValue(":np_category_id",$category_id);
$statement->bindValue(":np_code",$code);
$statement->bindValue(":np_name",$name);
$statement->bindValue(":np_price",$price);
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
        <h1>Add a Product</h1>
        Product Added!!
        <a href="editor.php">back</a>
       
    </body>
</html>

