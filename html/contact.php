<!DOCTYPE html>
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

    <div class="containercontact">
        <div class="title">
        <h1>Statements</h1>
        </div>
    </div>


    <div class="contactmain">
    <div class="contact">
        <h3>Are you sure you want to contact us??</h3>
        <p>Statements Limited<br>
            Company Reg No. 08468904<br>
            VAT Reg No. NL 170 630 138<br>

            Registered in Amsterdam, The Netherlands <br><br>
            0612345678
    </div>
</div>


    <!-- footer -->
    <footer>
    <div class="footertext">
            <ul class="menufooter">
            <li>
                    <a>&copy; STATEMENTS 2019</a>
                </li>
                <li>
                    <a href="../html.shipping.php">SHIPPING</a>
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





















