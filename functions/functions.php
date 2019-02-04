<?php 

$db_connection = mysqli_connect ("localhost", "root", "", "webshop");  //connectie met database

function getCats(){

    global $db_connection;  //zoek naar dbconnectie in global scope oftewel root scope  (global staat al buiten de functie gedefineerd)

    $SQL_QUERIE_SELECT_ALL_CATEGORIES = "SELECT * FROM categories"; // querie (opdracht)

    $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_CATEGORIES); // uitslag van de query en wat terug komt van de database

    foreach($DATABASE_RESULT as $row){   

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<li><a href='#'>$cat_title</a></li>";
    }
}

function getBrands(){

    global $db_connection;

    $SQL_QUERIE_SELECT_ALL_BRANDS = "SELECT * FROM brands";

    $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_BRANDS);

    foreach ($DATABASE_RESULT as $row){

        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];

        echo "<li><a href='#'>$brand_title</a></li>";
    }
}


function getPro(){

    global $db_connection;

    $get_pro = "SELECT product_id, product_cat, product_brand, product_title, product_image, product_price FROM products ORDER BY RAND () LIMIT 0,3"; //

    $run_pro = mysqli_query ($db_connection, $get_pro);

    foreach ($run_pro as $row){

        $pro_id = $row ['product_id'];
        $pro_cat = $row ['product_cat'];
        $pro_brand = $row ['product_brand'];
        $pro_title = $row ['product_title'];
        $pro_image = $row ['product_image'];
        $pro_price = $row ['product_price'];

    echo "
        <div id='single_product'>
        <h3>$pro_title</h3>
        <img src='../admin_area/product_images/$pro_image' width='180px' height='180px' />
        <p> $pro_price </p>
        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
        <a href='shop.php?pro_id=$pro_id'><button style='float:right;'>Add to cart</a>
        </div>
    ";

    }
    //webshop/admin_area/product_images/nike-air-monarch.jpg
}


