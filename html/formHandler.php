<?php
    echo $_POST["user_firstname"]; 
    echo "<br>";
    echo $_POST["user_lastname"]; 
    echo "<br>";
    echo $_POST["user_email"]; 
    echo "<br>";
    echo $_POST["user_password"]; 
   
    
        $firstname = $_POST["user_firstname"];
        $lastname = $_POST["user_lastname"];
        $email = $_POST["user_email"];
        $user_password = $_POST["user_password"];
    
    
        include "db_connection.php";
        try {
                $sql = "INSERT INTO customers (user_firstname, user_lastname, user_email, user_password)
                VALUES ('$firstname', '$lastname', '$email', '$user_password')";
                
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        
        $conn = null;
    
        //header("Location: index.php");  //Ga ik naar index.php
?>