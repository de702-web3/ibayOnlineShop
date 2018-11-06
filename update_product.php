<?php

require_once ("database.php");
$product_id= filter_input(INPUT_POST, "product_id");
$category_id= filter_input(INPUT_POST, "category_id");
$code= filter_input(INPUT_POST, "code");
$name= filter_input(INPUT_POST, "name");
$price= filter_input(INPUT_POST, "price");

$query="update products set categoryID= :np_category_id,"
        ."productCode= :np_code ,productName = :np_name, "
        ."listPrice = :np_price where productID = :np_product_id";
$statement = $db->prepare($query);
$statement->bindValue(":np_category_id",$category_id);
$statement->bindValue(":np_code",$code);
$statement->bindValue(":np_name",$name);
$statement->bindValue(":np_price",$price);
$statement->bindValue(":np_product_id",$product_id);
$statement ->execute();
$statement->closeCursor();


//query the database
?>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header><h1>Product Manager</h1></header>
        <h1>Update a Product</h1>
        Product Updated!!
        <br> <br>
        <a href="index.php">back</a>
        <footer>
            <p>&copy;<?php echo date("Y"); ?> My Guitar Shop,Inc.</p>
        </footer>
    </body>
</html>

