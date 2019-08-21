<!DOCTYPE html>
<html>
<body>
<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="MoneyBook";
    
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql="CREATE TABLE Income (
    income_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    income_store VARCHAR(30) NOT NULL,
    income_money INT(40) NOT NULL,
    income_value VARCHAR(10) NOT NULL,
    income_date INT(10) NOT NULL
    )";
    
    $sql="CREATE TABLE MyGuest (
    myguest_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    age INT(3) NOT NULL,
    job VARCHAR(20) NOT NULL,
    area VARCHAR(10) NOT NULL
    )";
    
    $sql="CREATE TABLE Show_expense (
    show_expense_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    expense_id VARCHAR(30) NOT NULL,
    age INT(3) NOT NULL,
    job VARCHAR(20) NOT NULL,
    store VARCHAR(30) NOT NULL,
    money INT(40) NOT NULL,
    value VARCHAR(10) NOT NULL,
    date INT(10) NOT NULL
    )";
    
    $sql="CREATE TABLE Expense (
    expense_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    store VARCHAR(30) NOT NULL,
    money INT(40) NOT NULL,
    value VARCHAR(10) NOT NULL,
    date INT(10) NOT NULL
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