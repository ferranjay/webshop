<!DOCTYPE html>
<?php include ("functions/functions.php") ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statements</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

	</head>

	<body>
    <!-- navigation bar-->
    <header>
        <nav class="containerone">

            <ul class="menu">
                <li>
                    <a href="index.php">HOME</a>
                </li>
                <li>
                    <a href="html/shop.php">SHOP</a>
                </li>
                <li>
                    <a href="customer/customer_registration.php">REGISTER</a>
                </li>
                <li>
                    <a href="customer/login.php">LOGIN</a>
                </li>
                <li>
                    <a href="html/cart.php">CART</a>
                </li>
            </ul>
            <form class="formone" method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product"/> 
                </form>
            
        </nav>
    </header>

    <!-- landing page -->

    <div class="containershop">
        <div class="title">
        <h1>Statements</h1>
        </div>
    </div>

    <div class="containershopmain">
    <div id="products_box"> 

    <?php
    //echo 'start';
    if(isset($_GET['pro_id'])){  // let er altijd op dat je ' ' goed gebruikt ---- HIERONDER TROUBLESHOOTING DEBUGGING //
        //echo '<br />Is Get<br />';
    $product_id = $_GET['pro_id'];
        //echo $product_id . '<br>';
    $get_pro = "SELECT product_id, product_cat, product_brand, product_title, product_image, product_price, product_desc FROM products WHERE product_id='$product_id'"; //
        //echo $get_pro . '<br>';
    $run_pro = mysqli_query ($db_connection, $get_pro);

    //var_dump($run_pro);
    //echo '<br><br>';
    foreach ($run_pro as $row){
    //echo 'foreach row <br />';
    $pro_id = $row ['product_id'];
    $pro_cat = $row ['product_cat'];
    $pro_brand = $row ['product_brand'];
    $pro_title = $row ['product_title'];
    $pro_image = $row ['product_image'];
    $pro_price = $row ['product_price'];
    $pro_desc = $row ['product_desc'];
    
    // check id or class below //
    echo "
    <div class='single_product'>     
    <h3>$pro_title</h3>
    <img src='admin_area/product_images/$pro_image'/>
    <p> $pro_price </p>
    <p> $pro_desc </p>
    <a href='html/shop.php?pro_id=$pro_id' style='float:left;'><b>Go Back</b></a>
    <a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add to cart</a>
    </div>
";
    }
}
    ?>



    <div id="shopping_cart"></div>
    </div>
    </div>
    </div>

    <div class="link-container">
    <h3>CATEGORIES</h3>

    <?php getCats(); ?>

    <h3>BRANDS</h3>
    
    <?php getBrands(); ?>

    </div>



    <!-- footer -->
    <footer>
    <div class="footertext">
            <ul class="menufooter">
            <li>
                    <a>&copy; STATEMENTS 2019</a>
                </li>
                <li>
                    <a href="html/shop.php">TERMS & CONDITIONS</a>
                </li>
                <li>
                    <a href="customer/customer_registration.php">SHIPPING</a>
                </li>
                <li>
                    <a href="html/cart.php">RETURNS</a>
                </li>
                <li>
                    <a href="customer/customer_registration.php">PRIVACY POLICY</a>
                </li>
                <li>
                    <a href="html/shop.php">CONTACT US</a>
                </li>
            </ul>
        </div>
    </footer>

    <script src="js/main.js"></script>

</body>

</html>