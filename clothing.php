

<?php

include("include/header.php");
$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT)));

/* Include "configuration.php" file */
require_once "configuration.php";

/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception

/* Perform query */
$query = "SELECT productName, listPrice, img FROM products where categoryID='1'";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":id", $id, PDO::PARAM_INT);
$statement->execute();
echo "<div class='container'>    
  <div class='row'>";
/* Manipulate the query result */
if ($statement->rowCount() > 0) {
//            echo "<div class='slideshow-container'>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $row) {
        echo "  <div class='col-sm-4'>
          <div class='panel panel-danger'>
                <div class='panel-heading'>" . $row->productName . "</div>";
        echo "       <div class='panel-body'><img src='img/" . $row->img . "' class='img-responsive'style='width:100%;display: table-cell;
  text-align: center;
  vertical-align: middle;' ></div>";
        echo "<div class='panel-footer'>Price: €" . $row->listPrice . "      
            
<form action='addC.php' method='post'>
   
            <input type='hidden' name='name' value='" . $row->productName . "'/>
          
            <input type='hidden' name='price' value='" . $row->listPrice . "'/>
      
            <input type='hidden' name='qty' value='1'/>
            <input type='submit' value='Add To Cart'/>
        </form>
        

     </div>
          </div>
        </div>";
    }
    echo "</div>";
    echo "<div style='text-align:center'>";
    foreach ($result as $row) {
        echo "<span class='dot'></span> ";
    }
    echo "</div></div>";
}
include("include/footer.php");
?>

