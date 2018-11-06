<?php
require_once ("database.php");
$category_id= filter_input(INPUT_POST, "category_id");
$product_id= filter_input(INPUT_POST, "product_id");

$query="select * from products where productID = :np_product_id";
$statement = $db->prepare($query);
$statement ->bindValue(":np_product_id",$product_id);
$statement->execute();
$product_array=$statement ->fetch();
$statement->closeCursor();

$queryCategory="select * from categories";
$statement1 = $db->prepare($queryCategory);
$statement1->execute();
$categories=$statement1 ->fetchAll();
$statement1->closeCursor();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header><h1>Product Manager</h1></header>
        <main>
            <h2>Update Product</h2>
            <form action="update_product.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
                <label>Category:</label>
                <select name="category_id">
                <?php foreach ($categories as $category) : ?>
                
                <option value="<?php echo $category["categoryID"]; ?>"
                    <?php 
                    if($category["categoryID"] == $category_id){
                        echo"selected";
                        
                    }
                    ?>
                    >
                <?php echo $category["categoryName"]; ?>
                
                </option>
                            <?php endforeach; ?>
                </select>
                        <?php echo $product_array["categoryID"]; ?>
                <label>Code:</label>
                <input type="text" name="code" value="<?php echo $product_array["productCode"]; ?>"/><br/>
                 <label>Name:</label>
                <input type="text" name="name" value="<?php echo $product_array["productName"]; ?>"/><br/>
                <label>Price:</label>
                <input type="text" name="price"
                       value="<?php echo $product_array["listPrice"] ; ?>"/><br/>
                
                <input type="submit" value="Update Product"/>
            </form>
        </main>
        <footer>
            <p>&copy;<?php echo date("Y"); ?> My Guitar Shop,Inc.</p>
        </footer>
    </body>
</html>
