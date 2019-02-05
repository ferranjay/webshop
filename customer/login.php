<!DOCTYPE html>
<?php
include ("db.php");
?>

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
                <li>
                    <a href="../html/cart.php">CART</a>
                </li>
                </ul>

                <form class="formone" method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product"/> 
                </form>
        </nav>
    </header>

    <!-- landing page -->

    <div class="containerlogin">
        <div class="title">
        <h1>Statements</h1>
        </div>
    </div>

    <div class="form-wrapper">

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
        <h1>Login</h1>
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





















