<!DOCTYPE html>
<html>
<body>
<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="college_social_network";
    
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql="CREATE TABLE Student (
    name VARCHAR(4) NOT NULL,
    department VARCHAR(15) NOT NULL,
    phone INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    age INT(2),
    )";
    
    $sql="CREATE TABLE Contest (
    name VARCHAR(20) NOT NULL,
    money INT(20),
    )";
    
    
    if($conn->query($sql) === TRUE)
    {
        $last_id = $conn->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    }
    else
    {
        echo "Error creating table: " . $conn->error;
        echo "<br>";
    }

    $conn->close();
    
?>
    
</body>
</html>