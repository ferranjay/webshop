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