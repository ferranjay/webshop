<?php 

include "db.php";   // connectie met database     

$ip = "192.0.0.1";
$customer_firstname = $_POST['customer_firstname'];             // variabelen en de benamingen 
$customer_lastname = $_POST['customer_lastname'];   
$customer_email = $_POST['customer_email'];
$customer_pass = $_POST['customer_pass'];  //
$customer_country = $_POST['customer_country'];
$customer_city = $_POST['customer_city'];
$customer_telephone = $_POST['customer_telephone'];
$customer_address = $_POST['customer_address'];

$insert_c = "INSERT INTO customers (customer_ip, customer_firstname, customer_lastname, customer_email, customer_pass, customer_country, customer_city, customer_telephone, customer_address) 
            VALUE ('$ip','$c_firstname','$c_lastname','$c_email','$c_pass','$c_country','$c_city','$c_telephone','$c_address')";

//echo $insert_c;

$run_c = mysqli_query($db_connection, $insert_c);  // variabele en query voor het uitvoeren van de opdracht

if($run_c) {          // als het door gebruiker is ingevoerd dan de onderstaande text.

    header("Location:../html/shop.php");
    echo "<script>alert('registration succesfull!')</script>";
}



?>
