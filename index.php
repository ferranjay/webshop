<!DOCTYPE html>
<?php include ("functions/functions.php") ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xventure</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:700" rel="stylesheet">


</head>

<body>
    <!-- navigation bar-->
    <header>
        <nav class="containerone">

            <ul class="menu">
                <li>
                    <a href="#main">Home</a>
                </li>
                <li>
                    <a href="html/shop.php">All products</a>
                </li>
                <li>
                    <a href="html/about.php">My account</a>
                </li>
                <li>
                    <a href="html/signuppage.php">SignUp</a>
                </li>
                <li>
                    <a href="html/contact.php">Contact</a>
                </li>
            </ul>

            <form class="formone" method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product"/> 
                </form>
        </nav>
    </header>

    <!-- landing page -->

    <div class="containertwo">
        <div class="title">
        <h1>Xventure</h1>
        </div>
    </div>

    <div class="containerthree">
        <div class="three-wrapper">
        <div class="main1">
            <h3 class="type1">Sport & Stylish lifestyle</h2>
        </div>
        <div class="main2">
            <h3 class="type2">New Items</h2>
        </div>
        <div class="main3">
            <h3 class="type3">Archive Sale</h2>
        </div>
        <div class="main4">
            <h3 class="type4">All products</h2>
        </div>
        </div>
    </div>

    <div class="link-container">
    <h3>Categories</h3>

    <?php getCats(); ?>

    <h3>Brands</h3>
    
    <?php getBrands(); ?>

    </div>






    <!-- footer -->
    <footer>
        <div class="footertext">
            Ferran Jay &copy; 2019
        </span>
    </footer>

    <script src="js/main.js"></script>
</body>

</html>