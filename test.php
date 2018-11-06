<?php
require_once ("database.php");

?>
<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script>
        
        </script>
    </head>
    <body>

        <form action='addCart.php' method='post'>
            <label>products</label>
       
            <br/>

            
            <input type='hidden' name='name' value='product1'/><br/>
          
            <input type='hidden' name='price' value='30'/><br/>
      
            <input type='hidden' name='qty' value='1'/><br/>
            <input type='submit' value='Add Product'/>
        </form>
        <br>
        <div id='name'>product1</div><br>
        <div id='price'>30</div><br>
       
        
<?php
//$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT)));
//
///* Include "configuration.php" file */
//require_once "configuration.php";
//
///* Connect to the database */
//$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
//$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception
//
///* Perform query */
//$query = "SELECT productName, listPrice, img,bimg FROM products where categoryID='1'";
//$statement = $dbConnection->prepare($query);
//$statement->bindParam(":id", $id, PDO::PARAM_INT);
//$statement->execute();
//echo "<div class='container'>    
//  <div class='row'>";
///* Manipulate the query result */
//if ($statement->rowCount() > 0) {
////            echo "<div class='slideshow-container'>";
//    $result = $statement->fetchAll(PDO::FETCH_OBJ);
//    foreach ($result as $row) {
//        echo "  <div class='col-sm-4'>
//            <div class='panel panel-primary'>
//                <div class='panel-heading'>" . $row->productName . "</div>";
//        echo "       <div class='panel-body'  ><img src='img/" . $row->img . "' class='img-responsive'style='width:100%;display: table-cell;
//  text-align: center;
//  vertical-align: middle;' id='img/". $row->bimg ."'></div>";
//        echo "<div class='panel-footer' id='price'>Price: €" . $row->listPrice . "</div>;
//            </div>
//        </div>";
//    }
//    echo "</div>";
//   echo "<div style='text-align:center'>";
//   foreach ($result as $row) {
//       echo "<span class='dot'></span> ";
//    }
//   echo "</div></div>";
//}
//?>
        
    </body>
</html>
