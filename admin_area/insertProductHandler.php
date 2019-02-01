<?php 
    
    include ("db.php");
    include ("functions/functions.php");

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

        $insert_product = "INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) 
        VALUE ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

            // echo insert_product;

        $insert_pro = mysqli_query($db_connection, $insert_product);

        if ($insert_product){

            echo "<script> alert('Product has been added')</script>";           //  alert message van succes bij het bijvoegen van een new product
            echo "<script>window.open('insert_product.php','_self')</script>";  // javascript syntax (window.open) , met deze zin "refresh" ik de pagina
        }
    }

?>

