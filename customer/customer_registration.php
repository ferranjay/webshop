<!DOCTYPE html>
<?php
//include ("../customer/db.php");
//include ("../customer/registerFormHandler.php");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xventure</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:700" rel="stylesheet">


</head>

<body>
    <!-- navigation bar-->
    <header>
        <nav class="containerone">

            <ul class="menu">
                <li>
                    <a href="../index.php">Home</a>
                </li>
                <li>
                    <a href="../html/shop.php">Shop</a>
                </li>
                <li>
                    <a href="../customer/customer_registration.php">Register</a>
                </li>
                <li>
                    <a href="../customer/login.php">Login</a>
                </li>
                <li>
                    <a href="../html/contact.php">Contact</a>
                </li>
            </ul>

            <form class="formone" method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product"/> 
                </form>
        </nav>
    </header>

    <!-- landing page -->

    <div class="containerregister">
        <div class="title">
        <h1>Xventure</h1>
        </div>
    </div>

    <div class="form-wrapper-register">

        <form action="registerFormHandler.php" method="post" enctype="multipart/form-data">

            <table> 
                <tr>
                    <td>Create an account</td>
                </tr>
                <tr>
                    <td>Customer Name:</td>
                    <td><input type="text" name="c_name" required/></td>
                </tr>
                <tr>
                    <td>Customer Email:</td>
                    <td><input type="text" name="c_email" required/></td>
                </tr>
                <tr>
                    <td>Customer Password:</td>
                    <td><input type="text" name="c_pass" required/></td>
                </tr>
                <tr>
                    <td>Customer Country:</td>
                        <td><select name="c_country">
                        <option>Select a Country</option>
                        <option>Belgium</option>
                        <option>Germany</option>
                        <option>France</option>
                        <option>Netherlands</option>
                        <option>Spain</option>
                        <option>United Kingdom</option></select>
                </td>
                </tr>
                <tr>
                    <td>Customer City</td>
                    <td><input type="text" name="c_city"/></td>
                </tr>
                <tr>
                    <td>Customer Contact</td>
                    <td><input type="text" name="c_contact"/></td>
                </tr>
                <tr>
                    <td>Customer Address</td>
                    <td><textarea cols="20" rows="10" name="c_address"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" name="register" value="Register"></td>
                </tr>
            </table>

        </form>
    </div>

    

    <!-- footer -->
    <footer>
        <div class="footertext">
         &copy; 2019 by www.xventure.com
        </span>
    </footer>

    <script src="js/main.js"></script>
</body>

</html>
