<?php

require_once ("database.php");
$productName= filter_input(INPUT_POST, "productName");

//query the database
$deleteQuery ="delete from cart where productName= :np_productName";
$statement =$db -> prepare($deleteQuery);
$statement -> bindValue(":np_productName",  $productName);
$statement ->execute();
$statement ->closeCursor();

include ("cart.php");