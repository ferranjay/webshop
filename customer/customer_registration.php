<!DOCTYPE html>
<?php
//include ("../customer/db.php");
//include ("../customer/registerFormHandler.php");
?>
<?php 
include ("../functions/functions.php");
include ("../customer/db.php");
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

        <form class="formone" method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product"/> 
                </form>

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

    <div class="containerregister">
        <div class="title">
        <h1>Statements</h1>
        </div>
    </div>

    <div class="form-wrapper-register">

        <form action="registerFormHandler.php" method="post" enctype="multipart/form-data">

            <table> 
                <tr>
                    <td>Customer Firstname:</td>
                    <td><input type="text" name="customer_firstname" required/></td>
                </tr>
                <tr>
                    <td>Customer Lastname:</td>
                    <td><input type="text" name="customer_lastname" required/></td>
                </tr>
                <tr>
                    <td>Customer Email:</td>
                    <td><input type="text" name="customer_email" required/></td>
                </tr>
                <tr>
                    <td>Customer Password:</td>
                    <td><input type="text" name="customer_password" required/></td>
                </tr>
                <tr>
                    <td>Customer Country:</td>
                        <td><select name="customer_country">
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
                    <td><input type="text" name="customer_city" required/></td>
                </tr>
                <tr>
                    <td>Customer Telephone</td>
                    <td><input type="text" name="customer_telephone" required/></td>
                </tr>
                <tr>
                    <td>Customer Address</td>
                    <td><textarea cols="20" rows="10" name="customer_address" required></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" class="submitButton2" name="register" value="Register"></td>
                </tr>
            </table>

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

<?php 
    if(isset($_POST['register'])){

        $ip = getIp();

        $customer_firstname = $_POST['customer_firstname'];  // lokale veriabele $c_name gemaakt waar we de data inzetten die uit de form komt hierboven
        $customer_lastname = $_POST['customer_firstname'];   // zo doen we dit ook voor de andere info velden die ingevuld worden
        $customer_email = $_POST['customer_email'];
        $customer_password = $_POST['customer_password'];
        $customer_country = $_POST['customer_country'];
        $customer_city = $_POST['customer_city'];
        $customer_telephone = $_POST['customer_telephone'];
        $customer_address = $_POST['customer_address'];

        // we hebben lokale variabelen gemaakt en deze info moet nu naar de database verstuurd worden

        echo $insert_customer = "INSERT INTO customers (customer_ip, customer_firstname, customer_lastname, customer_email, customer_password, 
        customer_country, customer_city, customer_telephone, customer_address) VALUES ('$ip','$customer_firstname','$customer_lastname','$customer_email',
        '$customer_password','$customer_country','$customer_city','$customer_telephone','$customer_address')";

        $run_customer = mysqli_query($db_connection, $insert_customer);

        if ($run_customer){
            echo "<script>alert('registration succesfull!'</script>";     // javascript alert 
        }

    }

?>
