<!DOCTYPE html>
<html>
<body>
<?php
    $servername="localhost";
    $username="root";
    $password="";
    // $dbname="college_social_network";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error)
    {
        die("Connection failed: ".$conn->connect_error);
    }
    
    $sql="create database MoneyBook";
    
   /* $sql="CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    }";
   */
    if($conn->query($sql) === TRUE)
    {
        echo "Table MyGuests created successfully";
        echo "Database success";
        echo "<br>";
    }
    else
    {
        echo "Error creating table: " . $conn->error;
        echo "Error creating db: ". $conn->error;
        echo "<br>";
    }

    $conn->close();
    
?>
</body>
</html>