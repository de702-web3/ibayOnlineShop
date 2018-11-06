<?php
ob_start();
session_start();
?>
<?php
require_once ("configuration.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
            <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            /* Remove the navbar's default rounded borders and increase the bottom margin */ 
            .navbar {
                margin-bottom: 50px;
                border-radius: 0;
            }

            /* Remove the jumbotron's default bottom margin */ 
            .jumbotron {
                margin-bottom: 0;
            }

            /* Add a gray background color and some padding to the footer */

        </style>
     
    </head>
    <?php

    $username = ltrim(rtrim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING))); //string
    $password = ltrim(rtrim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING))); //string


    if ($username == "admin" && $password == "1234") {
        $_SESSION['admin'] = true;
        $_SESSION['log_on'] = true; // set to false if this is not the administrator
    } else if (empty($username) && empty($password)) {
        $_SESSION['log_on'] = false;
        $_SESSION['admin'] = false;
    } else {
        $_SESSION['admin'] = false;
        $_SESSION['log_on'] = true;
    }
    ?>
    <body>

        <header class="header"  id="top" style=' position: relative;
                display: table;
                z-index: 2;
                width: 100%;
                height: 100%;
             '>
            <img src='img/bg.jpg' style='height: 145px; width: 100%; z-index: -20; position: absolute;'>
            <div class="text-vertical-center" style='  display: table-cell;
                 text-align: center;
                 vertical-align: middle;'>
                <h1>Welcome to Ibay</h1>
                <h3>The most popular online shopping website</h3>

            </div>
        </header>
    </div>
    

    <?php
    $id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT)));

    /* Include "configuration.php" file */
    require_once "configuration.php";

    /* Connect to the database */
    $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception

    /* Perform query */
    $query = "SELECT categoryName,src from categories ";
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $statement->execute();

    /* Manipulate the query result */
    if ($statement->rowCount() > 0) {
//            echo "<div class='slideshow-container'>";
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        echo" <nav class='navbar navbar-inverse'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>                        
                    </button>
<!--                    <a class='navbar-brand' href='#'>Logo</a>-->
                </div>
                <div class='collapse navbar-collapse' id='myNavbar'>
                    <ul class='nav navbar-nav' style='left: 400px;'>
                        <li ><a href='index.php'>Home</a></li>";
        foreach ($result as $row) {
            echo "     <li><a href='" . $row->src . "'>" . $row->categoryName . "</a></li>";
        }

        if ($_SESSION['log_on']) {
            echo "<li ><a href='editor.php'>Editor</a></li>";
        } else {
            
        }

        echo "  </ul>
                    <ul class='nav navbar-nav navbar-right'>";
        if ($_SESSION['log_on']) {
            echo "  <li><a href='log_out.php'><span class='glyphicon glyphicon-user'></span> logout</a></li>";
        } else {
            echo "  <li><a href='login_admin.php'><span class='glyphicon glyphicon-user'></span> Admin Login</a></li>";
        }


        echo"<li><a href='#'><span class='glyphicon glyphicon-shopping-cart'></span> Cart</a></li>
                    </ul>
                </div>
            </div>
        </nav>";
    }
    ?>
    <div style='margin:0 auto;'>
            <h1>Log In</h1>
            <form id="login_form"  action="editor.php" method="post">
                <div id="username">
                <label for="username">Username: </label>
                <input type="text" id = "username" name = "username" required autofocus><br>
                </div>
                <div id="password">
                <label for="password">Password: </label>
                <input type="password" id = "password" name = "password" required><br>
                <div id="login">
                <input type="submit" id="login" name="login" value="Log in">
                </div>
            </form>
     
</div>
    </body>
      

</html>

