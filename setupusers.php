<html>
<body>
<?php
    require_once 'login.php';
    $connection= new mysqli($hn,$un,$pw,$db);
    
    if($connection->connect_error) die($connection->connect_error);
    
    $salt1 = "qm&h*";
    $salt2 = "pg!@";
    
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $username = $_POST['id'];
    $password = $_POST['password'];
    $token = hash('ripemd128', "$salt1$password$salt2");
    
    add_user($connection,$forename,$surname,$username,$token);
    
    function add_user($connection, $fn, $sn, $un, $pw)
    {
        $query = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
    }
   
?>    
</body>
</html>