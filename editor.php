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
            footer {
                background-color: #f2f2f2;
                padding: 25px;
                .panel-body.img-responsive:hover
                    {
                     background-image: url('img/book.jpg');
   height: 70px;
                    
            }
        </style>
     
    </head>
    <?php
    session_start();
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
                background: url(../img/bg.jpg) no-repeat center center scroll;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;'>
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

  
 echo "<li ><a href='editor.php'>Editor</a></li>
            <li ><a href='sub.php'>Subscribers</a></li>";
        
    

        echo "  </ul>
                    <ul class='nav navbar-nav navbar-right'>";
    
            echo "  <li><a href='log_out.php'><span class='glyphicon glyphicon-user'></span> logout</a></li>";


        echo"<li><a href='#'><span class='glyphicon glyphicon-shopping-cart'></span> Cart</a></li>
                    </ul>
                </div>
            </div>
        </nav>";
    }
    ?>
<?php
require_once 'database.php';
$query = "select* from categories order by categoryID";
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
//print_r($categories); //show databases connected only
$statement->closeCursor();
if (!isset($category_id)) {
    $category_id = filter_input(INPUT_GET, "category_id", FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}
//get the categery name using the above $category_id
$queryCategery = "SELECT categoryName FROM categories WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategery);
$statement1->bindValue(":category_id", $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category["categoryName"];
$statement1->closeCursor();

$queryProduct = "SELECT * FROM products WHERE categoryID = :category_id";
$statement2 = $db->prepare($queryProduct);
$statement2->bindValue(":category_id", $category_id);
$statement2->execute();
$products = $statement2->fetchAll();
//$productCode = $products[0]["productCode"];
$statement2->closeCursor();
?>

    <div>
                <header><h1>Product Manager</h1></header>
        <main><h1>Product List</h1>
            <aside>
                <h2>Categories</h2>
                <nav>
                    <ul>
                        <?php foreach ($categories as $category) : ?>
                        <li><a href="editor.php?category_id=<?php echo $category['categoryID']; ?>">
                                    <?php echo $category['categoryName']; ?>
                                </a>
                                <form action="delete_category.php" method="POST">
                                    <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>"/>

                                    <input type="submit" value="Delete"/>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            <section>   
                <h2><?php echo $category_name; ?></h2>
                <table>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>

                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product["productCode"]; ?></td>
                            <td><?php echo $product["productName"]; ?></td>
                            <td><?php echo $product["listPrice"]; ?></td>
                            <td>
                                <form action="update_product_form.php" method="POST">
                                    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>"/>
                                    <input type="hidden" name="product_id" value="<?php echo $product["productID"]; ?>"/>
                                    <input type="submit" value="Update"/>
                                </form>

                            </td>
                            <td>
                                <form action="delete_product.php" method="POST">
                                    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>"/>
                                    <input type="hidden" name="product_id" value="<?php echo $product["productID"]; ?>"/>
                                    <input type="submit" value="Delete"/>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </section>
        </main>
        <br>
        <a href="add_product_form.php" >Add Product</a> <br>
        <a href="add_category_form.php" >Add category</a>
    </div>

    
</body>
</html>
