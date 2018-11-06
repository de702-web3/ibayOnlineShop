<?php
require_once ("database.php");

//get the values from the form

$productName= filter_input(INPUT_POST, "name");
$listPrice= filter_input(INPUT_POST, "price");
$qty= filter_input(INPUT_POST, "qty");


$query = "insert into cart
    (productName,listPrice,qty)"
        ." VALUES 
        ( :np_name, :np_price,:np_qty)";
$statement = $db->prepare($query);
$statement->bindValue(":np_name",$productName);
$statement->bindValue(":np_price",$listPrice);
$statement->bindValue(":np_qty",$qty);
$statement ->execute();
$statement->closeCursor();

include ("digitals.php");

?>

        
  