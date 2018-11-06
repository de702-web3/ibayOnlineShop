<?php

require_once ("database.php");
$category_id= filter_input(INPUT_POST, "category_id");
if (!isset($category_id)) {
    include ("editor.php");
    exit();
}

//query the database
$deleteQuery ="delete from categories where categoryID= :np_category_id";
$statement =$db -> prepare($deleteQuery);
$statement -> bindValue(":np_category_id",  $category_id);
$statement ->execute();
$statement ->closeCursor();

include ("editor.php");