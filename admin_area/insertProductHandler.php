<?php 

include "db.php";   // connectie met database     

$ip = "192.0.0.1";
$c_name = $_POST['c_name'];             // variabelen en de benamingen 
$c_email = $_POST['c_email'];
$c_pass = $_POST['c_pass'];  //
$c_country = $_POST['c_country'];
$c_city = $_POST['c_city'];
$c_contact = $_POST['c_contact'];
$c_address = $_POST['c_address'];

$insert_c = "INSERT INTO customers (customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address) 
            VALUE ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address')";

//echo $insert_c;

$run_c = mysqli_query($db_connection, $insert_c);  // variabele voor het uitvoeren van de opdracht

if($run_c) {          // als het door gebruiker is ingevoerd dan de onderstaande text.

    echo "<script>alert('registration succesfull!')</script>";
}



?>





<?php 
    echo " TUTORIALS";
        // ophalen van de text data in de tabellen

        if (isset($_POST['product_title'])) {

            $product_title = $_POST ['product_title'];
            $product_cat = $_POST ['product_cat'];
            $product_brand = $_POST ['product_brand'];
            $product_price = $_POST ['product_price'];
            $product_desc = $_POST ['product_desc'];
            $product_keywords = $_POST ['product_keywords'];
       

        // ophalen van de bijbehorende afbeelding

        $product_image = $_FILES ['product_image']['name'];
        $product_image_tmp = $_FILES ['product_image']['tmp_name'];

        move_uploaded_file($product_image_tmp,"product_images/$product_image"); // default functie voor het uploaden van een afbeelding

        $insert_product = "insert into products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords',)";

            echo insert_product;

        $insert_pro = mysqli_query($db_connection, $insert_product);

        if ($insert_product){

            echo "<script> alert('Product has been added')</script>";           //  alert message van succes bij het bijvoegen van een new product
            echo "<script>window.open('insert_product.php','_self')</script>";  // javascript syntax (window.open) , met deze zin "refresh" ik de pagina
        }
    }

?>



<?php
        $SQL_QUERIE_SELECT_ALL_BRANDS = "SELECT * FROM brands";

        $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_BRANDS);

        foreach ($DATABASE_RESULT as $row){

            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];

        echo "<option>$brand_title</option>";   

        }

        ?>


<?php  

        $SQL_QUERIE_SELECT_ALL_CATEGORIES = "SELECT * FROM categories"; // querie (opdracht)

        $DATABASE_RESULT = mysqli_query ($db_connection, $SQL_QUERIE_SELECT_ALL_CATEGORIES); // uitslag van de query en wat terug komt van de database

        foreach($DATABASE_RESULT as $row){   

            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<option>$cat_title</option>";
        }

        ?>