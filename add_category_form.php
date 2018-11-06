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
            <form action="add_category.php" method="post">
                <label>Category:</label>
                                 <input type="text" name="category_name"/><br/>
                                  <input type="submit" value="Add Category"/> 
            </form>
          
        </main>
    
    </body>
</html>
