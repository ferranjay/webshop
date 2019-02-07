<?php 

//CONNECTIE MET DATABASE//


$db_connection = mysqli_connect ("localhost", "root", "", "webshop");  

        if (mysqli_connect_error()) {
        
            echo "The connection was not established: " .mysqli_connect_error();
}


// HET IP ADRES VERKRIJG JE MET DE CODE HIERONDER
// Dit kun je checken dmv $ip=getIp(); te echoen op de index.php tussen php haakjes// 

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];

    }   elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
        return $ip;
}


// WINKELWAGEN

function cart (){

    if(isset($_GET['add_cart'])){

        global $db_connection;          // connectie maken met server

            $ip = getIP();
            $pro_id = $_GET['add_cart'];            // pak de add_cart en geef die info aan de lokale variabele $pro_id

            $check_pro = "SELECT * FROM cart WHERE ip_add='$ip' AND p_id ='$pro_id'";

            $run_check = mysqli_query($db_connection, $check_pro);

        if (mysqli_num_rows($run_check)>0) {            // als het aantal 0 is niks doen en anders de else statement uitvoeren hieronder 
            echo "";
        }

        else {

            $insert_pro = "insert into cart (p_id, ip_add) values ('$pro_id','$ip')";

            $run_pro = mysqli_query($db_connection, $insert_pro);

            echo "<script>window.open('shop.php','_self')</script>";
        }
    }
}


// OPHALEN TOTAAL AANTAL ITEMS IN WINKELWAGEN 

function total_items() {

    if(isset($_GET['add_cart'])){

        global $db_connection;

            $ip = getIp();

            $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";

            $run_items = mysqli_query($db_connection,$get_items);   
        
            $count_items = mysqli_num_rows($run_items);
    }
    else {                 

        global $db_connection;

        $ip = getIp();

        $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";

        $run_items = mysqli_query($db_connection,$get_items);   
    
        $count_items = mysqli_num_rows($run_items);

    }
    
    echo $count_items;

    }



// OPHALEN VAN TOTALE PRIJS MET FOR EACH  .... moet nog uitgewerkt worden

// function total_price(){

//    global $db_connection;

//   $ip = getIp();

//   $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";  // met het ip van de bezoeker wil ik de producten ook ophalen 

//   $run_price = mysqli_query($db_connection, $sel_price);

//   foreach ($DATABASE_RESULT as $pro_price){

//       $pro_id = $pro_price['p_id'];

//        $pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";

//       $run_pro_price = mysqli_query($db_connection, $pro_price);
//   }

//} 


//  OPHALEN VAN TOTALE PRIJS MET WHILE LOOP   DIT MOET VERVANGEN WORDEN MET foreach

function total_price(){
	
    $total = 0;
    
    global $db_connection; 
    
        $ip = getIp(); 
    
        $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";       //ophalen info van de cart tabel dmv IP adres van klant
    
        $run_price = mysqli_query($db_connection, $sel_price); 
    
    while($p_price=mysqli_fetch_array($run_price)){
        
        $pro_id = $p_price['p_id'];                 // info vanuit de tabel gehaald naar variabele $pro_id 
        
        $pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";
        
        $run_pro_price = mysqli_query($db_connection,$pro_price); 
        
        while ($pp_price = mysqli_fetch_array($run_pro_price)){
        
        $product_price = array($pp_price['product_price']);       // gebruik van array om alle info in een keer te laten zien ipv achter elkaar
        
        $values = array_sum($product_price);                     // dmv array_sum hebben we een calculatie gemaakt van de totale prijs
        
        $total +=$values;
        
        }
    
    
    }
    
    echo "€" . $total;
    

}

// UPDATEN VAN WINKELWAGEN 

function updatecart(){

    global $db_connection;

    $ip = getIp();  // function

    if(isset($_POST['update_cart'])){   // als update cart button geclicked is wat moet er dan gedaan worden 

        foreach($_POST['remove'] as $remove_id){// remove_id is een lokale variabele die je zelf benoemt, we maken een loop, 
                                                // de geselecteerd input field is 'remove'  en die moet de lokale variabele verwijderen.
        $delete_product = "DELETE FROM cart WHERE p_id='$remove_id' AND ip_add='$ip'"; // hier geef je welke info de variabele $delete_product heeft

        $run_delete = mysqli_query($db_connection, $delete_product);

        if($run_delete){
            echo "<script>window.open('cart.php','_self')</script>";  //met de _self attribute refresh je de pagina dit doen we nadat update geclicked is
        }
    }
}

        if(isset($_POST['continue'])){         // indien mensen weer verder willen winkelen en op continue drukken gaan ze terug naar shop.php
        echo "<script>window.open('shop.php', '_self')</script>";  
        }

        echo @$up_cart = updatecart();
    
}






// OPHALEN VAN CATEGORIEN //

function getCats(){

    global $db_connection;              //zoek naar dbconnectie in global scope oftewel root scope  (global staat al buiten de functie gedefineerd)

    $SQL_QUERIE_SELECT_ALL_CATEGORIES = "SELECT * FROM categories";         // querie (opdracht)

    $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_CATEGORIES);           // uitslag van de query en wat terug komt van de database

    foreach($DATABASE_RESULT as $row){   

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>";   // link naar de categorien  cat variabele aangemaakt die gelijk is aan $cat_id //
    }
}


// OPHALEN VAN BRANDS

function getBrands(){

    global $db_connection;

    $SQL_QUERIE_SELECT_ALL_BRANDS = "SELECT * FROM brands";

    $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_BRANDS);

    foreach ($DATABASE_RESULT as $row){

        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];

        echo "<li><a href='shop.php?brand=$brand_id'>$brand_title</a></li>";            // zelfde verhaal als bij categories hierboven //
    }
}


// FUNCTIE INDIEN GEEN CLICK OP CAT OF BRANDS

function getPro(){

    if(!isset($_GET['cat'])){                    // als er niet op de categorien of brands geclickt word dan voer je het onderstaande uit //
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


// FUNCTIE VOOR SPECIFIEK GESELECTEERDE CATEGORIE
// nieuwe functie aangemaakt voor specifiek de categorien //

function getCatPro(){

    if(isset($_GET['cat'])){            // als er niet op de categorien of brands geclickt word dan voer je het onderstaande uit !weggehaald //
    
        $cat_id = $_GET['cat'];         // als er geclicked word moet er dus nu een dynamische link aangemaakt worden //

    global $db_connection;

    // nieuwe variabele die nu specifieke info haalt mbt categorien //
    $get_cat_pro = "SELECT product_id, product_cat, product_brand, product_title, product_image, product_price FROM products WHERE product_cat='$cat_id'"; //

    $run_cat_pro = mysqli_query ($db_connection, $get_cat_pro);

    $count_cats = mysqli_num_rows($run_cat_pro);            // nieuwe variabele waarbij ik wil tellen hoeveel 'records' er in de querie zitten //

    foreach ($run_cat_pro as $row){

        $pro_id = $row ['product_id'];
        $pro_cat = $row ['product_cat'];
        $pro_brand = $row ['product_brand'];
        $pro_title = $row ['product_title'];
        $pro_image = $row ['product_image'];
        $pro_price = $row ['product_price'];

        if($count_cats==0){                                                     // als het getal gelijk is aan nul dan het volgende bericht //

            echo "<h2>There is no product in this category!</h2>";                      // deze moet ik nog chekken want deze werkt nog niet //
        }

        else {           // anders gewoon het volgende laten zien //

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
    }           //webshop/admin_area/product_images/nike-air-monarch.jpg
}
}


// FUNCTIE VOOR SPECIFIEK GESELECTEERDE BRANDS

function getBrandPro(){

    if(isset($_GET['brand'])){            // als er niet op de categorien of brands geclickt word dan voer je het onderstaande uit !weggehaald //
    
        $brand_id = $_GET['brand'];         // als er geclicked word moet er dus nu een dynamische link aangemaakt worden //

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

        if($count_brands==0){                                                // als het getal gelijk is aan nul dan het volgende bericht //

            echo "<h2>There is no product in this category!</h2>";                  // deze moet ik nog chekken want deze werkt nog niet //
        }

        else {                                                                                   // anders gewoon het volgende laten zien //

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
    }                                                                                   //webshop/admin_area/product_images/nike-air-monarch.jpg
}
}