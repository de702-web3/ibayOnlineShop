<?php

require_once ("database.php");
$product_id= filter_input(INPUT_POST, "product_id");
$category_id= filter_input(INPUT_POST, "category_id");
if (!isset($product_id)) {
    include ("index.php");
    exit();
}

//query the database
$deleteQuery ="delete from products where productID= :np_product_id";
$statement =$db -> prepare($deleteQuery);
$statement -> bindValue(":np_product_id",  $product_id);
$statement ->execute();
$statement ->closeCursor();

include ("editor.php");