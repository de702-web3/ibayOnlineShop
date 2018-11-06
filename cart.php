<?php
include("include/header.php");
?>

<!DOCTYPE html>
<html>
    <link href="./assets/progress-wizard.min.css" rel="stylesheet" type="text/css"/>
    		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/custom.css"/>	
                <link rel="stylesheet" href="assets/form-validation.css">
<!--
    <div class="container-fluid breadcrumbBox text-center">
        <ol class="breadcrumb">
            <li class="active"><a href="#">Review</a></li>
            
            <li><a href="#">Payment</a></li>
        </ol>
    </div>-->

    <div class="progress_indicator_container">
<ul class="progress_indicator">
<li class="completed">
<span class="bubble"></span>
Review
</li>
<li>
<span class="bubble"></span>
Confirmation
</li>                        
<li>
<span class="bubble"></span>
Payment
</li>
</ul>
</div>
    <div class="container text-center">

        <div class="col-md-5 col-sm-12">
            <div class="bigcart"></div>
            <h1>Your shopping cart</h1>
            
        </div>
        <?php
        $id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT)));

        /* Include "configuration.php" file */
        require_once "configuration.php";

        /* Connect to the database */
        $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception

        /* Perform query */
        $query1 = "SELECT * from cart";
        $statement1 = $dbConnection->prepare($query1);
        $statement1->bindParam(":id", $id, PDO::PARAM_INT);
        $statement1->execute();
        echo "<div class='col-md-7 col-sm-12 text-left'>
				<ul>
					<li class='row list-inline columnCaptions'>
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>";
        /* Manipulate the query result */
        if ($statement1->rowCount() > 0) {
//            echo "<div class='slideshow-container'>";
            $result = $statement1->fetchAll(PDO::FETCH_OBJ);
        
            foreach ($result as $row) {
                $total=  $row->listPrice +$total;
                echo"<li class='row'>
            <span class='quantity'>" . $row->qty . "</span>
            <span class='itemName'>" . $row->productName . "</span>
            <span class='popbtn'><a class='arrow'></a></span>
            <span class='price'>€" . $row->listPrice . "</span>
        </li>";
            }
          echo"        <li class='row totals'>
            <span class='itemName'>Total:</span>
            <span class='price'>€".$total.".00</span>
            <span class='order'> <a href='payment.php' class='text-center'>ORDER</a></span>
        </li>
    </ul>
</div>

</div>
<div id='popover' style='display: none'>
  
    <form action='deleteCart.php' method='POST'>
                                    <input type='hidden' name='productName' value='" . $row->productName . "'/>

                                    <input type='submit'class='glyphicon glyphicon-remove'/>
                                </form>

</div>";
        }
        ?>


<!-- The popover content -->


<!-- JavaScript includes -->

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/customjs.js"></script>

</body>
</html>