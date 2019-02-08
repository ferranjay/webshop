<!DOCTYPE html>
<?php include ("db.php");?>
<?php include ("../functions/functions.php") ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statements</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">


</head>

<body>
    <!-- navigation bar-->
    <header>
        <nav class="containerone">

        <!-- <form class="formone" method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product" />
            </form> -->

            <ul class="menu">
                <li>
                    <a href="../index.php">HOME</a>
                </li>
                <li>
                    <a href="../html/shop.php">SHOP</a>
                </li>
                <li>
                    <a href="../customer/customer_registration.php">REGISTER</a>
                </li>
                <li>
                    <a href="../customer/login.php">LOGIN</a>
                </li>
                </ul>

                <div class="shopping_cart"> <?php cart(); ?>
        <span>TOTAL ITEMS.&nbsp; &nbsp;<?php total_items(); ?><br>TOTAL PRICE.&nbsp;&nbsp;<?php total_price();?></b><br><a href="../html/cart.php">GO TO CART</a></span>
    </div>
        </nav>
    </header>

    <!-- landing page -->

    <div class="containerlogin">
        <div class="title">
        <h1>Statements</h1>
        </div>
    </div>

    <div class="form-wrapper">

    <!--    NOG IN TE VOEREN WAT ER GEBEURT ALS IEMAND CORRECT IS INGELOGD -->
    <?php
    //if(){}
    //isset()
    //$_GET['et']
        if(isset($_GET['et'])){
            echo '<h1> EMAIL/WW IS INCORRECT </h1>';
        }else{
            //niks
        }
    ?>

    <form class="loginForm" action="loginFormHandler.php" method="POST">
        <h1></h1>
        <label for="username">Email:</label>
        <input type="email" id="username" name="customer_email" autofocus required/>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="customer_pass" required/>

        <button type="submit" class="submitButton">Login</button>
        <p>Don't have an account? <a href="customer_registration.php">Register here</a></p>
    </form>
    </div>

    


    <!-- footer -->
    <footer>
    <div class="footertext">
            <ul class="menufooter">
            <li>
                    <a>&copy; STATEMENTS 2019</a>
                </li>
                <li>
                    <a href="../html/shipping.php">SHIPPING</a>
                </li>
                <li>
                    <a href="../html/returns.php">RETURNS</a>
                </li>
                <li>
                    <a href="../html/contact.php">CONTACT US</a>
                </li>
            </ul>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>

</html>





















