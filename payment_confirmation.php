
<?php
include("include/header.php");

$query = "TRUNCATE TABLE `cart`";
$statement = $db->prepare($query);
$statement ->execute();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>-
<head>
<title>Stripe Example</title>  

<link rel="stylesheet" href="assets/form-validation.css">

<link href="./assets/progress-wizard.min.css" rel="stylesheet" type="text/css"/>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="./img/logo.jpg">
</head>

<body>
<div class="main-content">

<form class="form-validation" id="dor_payment_form">
<h2><img style="vertical-align: middle;height:2.5em" src="./img/logo.jpg" alt=""/> The Ibay Company</h2>

<!-- Progress Bar -->
<div class="progress_indicator_container">
<ul class="progress_indicator">
<li class="completed">
<span class="bubble"></span>
Register
</li>
<li class="completed">
<span class="bubble"></span>
Payment
</li>                        
<li class="completed">
<span class="bubble"></span>
Confirmation
</li>
</ul>
</div>
<!-- End of Progress Bar -->

<div style='text-align: center;'>
<p>Your payment is confirmed. Thank you for your order.</p>
<a href="index.php">Click here to return to our website</a></div>
</form>

</div> 
</body>


</html>