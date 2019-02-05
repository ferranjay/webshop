<?php 

$db_connection = mysqli_connect ("localhost", "root", "", "webshop");  //connectie met database

if (mysqli_connect_error()) {
    echo "The connection was not established: " .mysqli_connect_error();
}

// Het IP adres verkrijg je met de code hieronder , dit kun je checken dmv $ip=getIp(); te echoen op de index.php tussen php haakjes// 

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}


// WINKELWAGEN

function cart (){

    if(isset($_GET['add_cart'])){

        global $db_connection;

        $ip = getIP();
        $pro_id = $_GET['add_cart'];        // pak de add_cart en geef die info aan de lokale variabele $pro_id

        $check_pro = "SELECT * FROM cart WHERE ip_add='$ip' AND p_id ='$pro_id'";

        $run_check = mysqli_query($db_connection, $check_pro);

        if (mysqli_num_rows($run_check)>0) {  // als het aantal 0 is niks doen en anders de else statement uitvoeren hieronder 
            echo "";
        }
        else {
            $insert_pro = "insert into cart (p_id, ip_add) values ('$pro_id','$ip')";

            $run_pro = mysqli_query($db_connection, $insert_pro);

            echo "<script>window.open('shop.php','_self')</script>";
        }
    }
}






// Het ophalen van de categorien //

function getCats(){

    global $db_connection;  //zoek naar dbconnectie in global scope oftewel root scope  (global staat al buiten de functie gedefineerd)

    $SQL_QUERIE_SELECT_ALL_CATEGORIES = "SELECT * FROM categories"; // querie (opdracht)

    $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_CATEGORIES); // uitslag van de query en wat terug komt van de database

    foreach($DATABASE_RESULT as $row){   

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>";   // link naar de categorien  cat variabele aangemaakt die gelijk is aan $cat_id //
    }
}


// ------------------------------------------------------------------------------------------------------------------//
function getBrands(){

    global $db_connection;

    $SQL_QUERIE_SELECT_ALL_BRANDS = "SELECT * FROM brands";

    $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_BRANDS);

    foreach ($DATABASE_RESULT as $row){

        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];

        echo "<li><a href='shop.php?brand=$brand_id'>$brand_title</a></li>";   // zelfde verhaal als bij categories hierboven //
    }
}

// ------------------------------------------------------------------------------------------------------------------//

function getPro(){

    if(!isset($_GET['cat'])){            // als er niet op de categorien of brands geclickt word dan voer je het onderstaande uit //
        if(!isset($_GET['brand'])){


    global $db_connection;

    $get_pro = "SELECT product_id, product_cat, product_brand, product_title, product_image, product_price FROM products ORDER BY RAND ()"; //

    $run_pro = mysqli_query ($db_connection, $get_pro);

    foreach ($run_pro as $row){

        $pro_id = $row ['product_id'];
        $pro_cat = $row ['product_cat'];
        $pro_brand = $row ['product_brand'];
        $pro_title = $row ['product_title'];
        $pro_image = $row ['product_image'];
        $pro_price = $row ['product_price'];

    echo "
        <div class='single_product'>
        <h3>$pro_title</h3>
        <img src='../admin_area/product_images/$pro_image' width='180px' height='180px' />
        <p> Price: $pro_price </p>
        <a href='../details.php?pro_id=$pro_id' style='float:left;'>Details</a>
        <a href='shop.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</a>
        </div>
    ";

    }
    //webshop/admin_area/product_images/nike-air-monarch.jpg
}
}
}


// ------------------------------------------------------------------------------------------------------------------//
// nieuwe functie aangemaakt voor specifiek de categorien //

function getCatPro(){

    if(isset($_GET['cat'])){            // als er niet op de categorien of brands geclickt word dan voer je het onderstaande uit !weggehaald //
    
        $cat_id = $_GET['cat'];       // als er geclicked word moet er dus nu een dynamische link aangemaakt worden //

    global $db_connection;

    // nieuwe variabele die nu specifieke info haalt mbt categorien //
    $get_cat_pro = "SELECT product_id, product_cat, product_brand, product_title, product_image, product_price FROM products WHERE product_cat='$cat_id'"; //

    $run_cat_pro = mysqli_query ($db_connection, $get_cat_pro);

    $count_cats = mysqli_num_rows($run_cat_pro);   // nieuwe variabele waarbij ik wil tellen hoeveel 'records' er in de querie zitten //

    foreach ($run_cat_pro as $row){

        $pro_id = $row ['product_id'];
        $pro_cat = $row ['product_cat'];
        $pro_brand = $row ['product_brand'];
        $pro_title = $row ['product_title'];
        $pro_image = $row ['product_image'];
        $pro_price = $row ['product_price'];

        if($count_cats==0){  // als het getal gelijk is aan nul dan het volgende bericht //

            echo "<h2>There is no product in this category!</h2>";    // deze moet ik nog chekken want deze werkt nog niet //
        }

        else {              // anders gewoon het volgende laten zien //

    echo "
        <div class='single_product'>
        <h3>$pro_title</h3>
        <img src='../admin_area/product_images/$pro_image' width='180px' height='180px' />
        <p> $pro_price </p>
        <a href='../details.php?pro_id=$pro_id' style='float:left;'>Details</a>
        <a href='shop.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</a>
        </div>
    ";

    }
    }   //webshop/admin_area/product_images/nike-air-monarch.jpg
}
}


// ------------------------------------------------------------------------------------------------------------------//


function getBrandPro(){

    if(isset($_GET['brand'])){            // als er niet op de categorien of brands geclickt word dan voer je het onderstaande uit !weggehaald //
    
        $brand_id = $_GET['brand'];       // als er geclicked word moet er dus nu een dynamische link aangemaakt worden //

    global $db_connection;

    // nieuwe variabele die nu specifieke info haalt mbt categorien //
    $get_brand_pro = "SELECT product_id, product_cat, product_brand, product_title, product_image, product_price FROM products WHERE product_brand='$brand_id'"; //

    $run_brand_pro = mysqli_query ($db_connection, $get_brand_pro);

    $count_brands = mysqli_num_rows($run_brand_pro);   // nieuwe variabele waarbij ik wil tellen hoeveel 'records' er in de querie zitten //

    foreach ($run_brand_pro as $row){

        $pro_id = $row ['product_id'];
        $pro_cat = $row ['product_cat'];
        $pro_brand = $row ['product_brand'];
        $pro_title = $row ['product_title'];
        $pro_image = $row ['product_image'];
        $pro_price = $row ['product_price'];

        if($count_brands==0){  // als het getal gelijk is aan nul dan het volgende bericht //

            echo "<h2>There is no product in this category!</h2>";    // deze moet ik nog chekken want deze werkt nog niet //
        }

        else {              // anders gewoon het volgende laten zien //

    echo "
        <div class='single_product'>
        <h3>$pro_title</h3>
        <img src='../admin_area/product_images/$pro_image' width='180px' height='180px' />
        <p> $pro_price </p>
        <a href='../details.php?pro_id=$pro_id' style='float:left;'>Details</a>
        <a href='shop.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</a>
        </div>
    ";

    }
    }   //webshop/admin_area/product_images/nike-air-monarch.jpg
}
}