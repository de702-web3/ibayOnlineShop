<?php
require_once ("database.php");
$query = "select * from categories";
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>

<html>
    <head>
      
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php include("include/header.php");?>
        <main>
            <h2>Add Product</h2>
            <form action="add_product.php" method="post">
                <label>Category</label>
                <select name="category_id">
                    <?php foreach ($categories as$category_row): ?>
                    <option value="<?php echo $category_row["categoryID"] ;?>">
                    <?php echo$category_row["categoryName"]; ?>
                    </option>
                    <?php endforeach;  ?>

                </select>
                <br/>
                <label>Code:</label>
                <input type="text" name="code"/><br/>
                <label>Name:</label>
                <input type="text" name="name"/><br/>
                <label>Price:</label>
                <input type="text" name="price"/><br/>
                <input type="submit" value="Add Product"/>
            </form>
        </main>
     
    </body>
</html>
