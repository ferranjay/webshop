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
                    <a href="../html/about.php">REGISTER</a>
                </li>
                <li>
                    <a href="../html/signuppage.php">LOGIN</a>
                </li>
                <li>
                    <a href="../html/contact.php">CONTACT</a>
                </li>

            <form class="formone" method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product"/> 
                </form>
                </ul>
        </nav>
    </header>

    <!-- landing page -->

    <div class="containertwo">
        <div class="title">
        <h1>Statements</h1>
        </div>
    </div>


        <div class="form-wrapper">

    <form class="insertproduct" action="insertProductHandler.php" method="post" enctype="multipart/form-data">

        <table>
        <tr>
        <td>Product Title</td>
        <td><input type="text" name="product_title" size="30" required/></td>
        </tr>

        <tr>
        <td>Product Category</td>
        <td> 
        <select name="product_cat" required><option>Select</option>
        <?php 

        $SQL_QUERIE_SELECT_ALL_CATEGORIES = "SELECT * FROM categories"; // querie (opdracht)

        $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_CATEGORIES); // uitslag van de query en wat terug komt van de database

        foreach($DATABASE_RESULT as $row){   

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<option value='$cat_id'>$cat_title</option>";
        }
        ?>
        </select>
        </td>
        </tr>

        <tr>
        <td>Product Brand</td>
        <td>
        <select name="product_brand" required><option>Select</option>

        <?php
        $SQL_QUERIE_SELECT_ALL_BRANDS = "SELECT * FROM brands";

        $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_BRANDS);
    
        foreach ($DATABASE_RESULT as $row){
    
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
    
            echo "<option value='$brand_id'>$brand_title</option>";
        }
        ?>
        </select>
        </td>
        </tr>

        <tr>
        <td>Product Image</td>
        <td><input type="file" name="product_image"/></td>
        </tr>

        <tr>
        <td>Product Price</td>
        <td><input type="text" name="product_price" required size="30"/></td>
        </tr>

        <tr>
        <td>Product Description</td>
        <td><textarea name="product_desc"></textarea></td>
        </tr>

        <tr>
        <td>Product Keywords</td>
        <td><input type="text" name="product_keywords" required size="30"/></td>
        </tr>

        <tr>
        <td>Add</td>
        <td><input type="submit" name="insert_post" value="Insert new" size="30"/></td>
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
