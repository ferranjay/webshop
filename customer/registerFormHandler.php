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
