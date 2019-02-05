<!DOCTYPE html>
<?php include ("functions/functions.php") ?>
<?php include ("admin_area/db.php") ?>

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

    <div class="containertwo">
    <video playsinline autoplay muted loop poster="../img.33.jpg" id="bgvideo" width="x" height="y">
        <source src="RIMOWA.mp4" type="video/mp4">
        </video>
        <div class="title">
        <h1>Statements</h1>
        </div>
    </div>

    <div class="containerthree">
    <h2>"Making a statement with style "</h2>
        <div class="three-one">
            We are a lifestyle brand focussing on unique fashionable products. Our inspiration is based on a variety of styles, combining cultures and stylish clothes. 
                Our core value is to tell a story with stylish products. Statements hopes to bridge the gap between street culture and high fashion.  We manufacture goods that are classic, premium quality, unique and timeless.
                <br><br> 
        </div>
    </div>

    <div class="containerfour">
        <div class="four-two">
            <ul>Wholesale <br><br>
            If you are interested in becoming an official <br> stockist, please email us at wholesale@statements.com <br>with the following information regarding your store: <br><br>
            Name of store & location<br>Owner name<br>Pictures of your store's interior & exterior.<br>List of brands carried.<br>Stores contact information, including buyer or manager.
            <br>
            </ul>



        </div>
        <div class="four-three"><p>Statement of the month</p>
            <img src="img/77.jpg" >
        </div>
        <div class="four-four">
            <ul>Newsletter <br><br>
            Subscribe to get special offers, free giveaways, <br>restock updates and sale promotions.<ul>
            <br><br><br><br><br> <p>SIGN ME UP!</p>
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