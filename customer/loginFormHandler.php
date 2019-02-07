<?php
    include "../customer/db.php";
    $customer_email = $_POST['customer_email'];
    $customer_password = $_POST['customer_pass'];

    $result = "SELECT customer_firstname
               FROM customers 
               WHERE customer_email = '$customer_email' 
               AND customer_pass = '$customer_password'";

    $db_result = $db_connection->query($result);

    if ($db_result->rowCount() != 0){
        foreach($db_result as $row){
            $name = $row['customer_firstname'];
        }
        
        echo "welcome " . $customer_name;
    }
    else 
    {
        echo 'Your customer name or password is incorrect!';
        header("location:login.php?et=1;");
    }
?>