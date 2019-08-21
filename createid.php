<html>
<head>
<style>
h2 {
    color:red;
}
ul {
    list-style-type: none;
    margin:0;
    padding:0;
    overflow:hidden;
    background-color:#333;
}
li {
    float:left;
}
li a, .dropbtn {
    display:inline-block;
    color:white;
    text-align:center;
    padding:14px 16px;
    text-decoration:none;
}
li a:hover, .dropdown:hover .dropbtn {
    background-color:red;
}

li.dropdown {
    display:inline-block;
}

.dropdown-content {
    display:none;
    position:absolute;
    background-color:#000000;
    min-width:160px;
    box-shadow:0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index:1;
}

.dropdown-content a:hover {
    background-color:red;
}

.dropdown:hover .dropdown-content
{
    display:block;
}
</style>
</head>
<body>
<h2> CREATE ID </h2>
<ul>
    <li><a href="main.php">HOME</a></li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">MY PROFILE</a>
        <div class="dropdown-content">
            <a href="createid.php">MY Profile</a>
        </div>
    </li>
     <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">INCOME</a>
        <div class="dropdown-content">
            <a href="createinc.php">INCOME</a>
        </div>
    </li>
     <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">EXPENSE</a>
        <div class="dropdown-content">
            <a href="createexp.php">EXPENSE</a>
        </div>
    </li>
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">LEDGER</a>
        <div class="dropdown-content">
            <a href="#">LEDGER</a>
        </div>
    </li>
</ul>
<br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<h3>Name: <input type="text" name="name"></input></h3> 
<br>
<h3>Age : <input type="text" name="age"></input></h3>
<br>
<h3>Job : <input type="text" name="job"></input></h3>
<br>
<h3>Area : <input type="text" name="area"></input></h3>
<br>
<input type="submit" name="submit"></input>
<p></p>

<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="MoneyBook";
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
    {
       die("Connection failed: " . $conn->connect_error);
    }
    
    $d1 = $d2 = $d3 = $d4 = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $d1 = test_input($_POST["name"]);
        $d2 = test_input($_POST["age"]);
        $d3 = test_input($_POST["job"]);
        $d4 = test_input($_POST["area"]);
    }

    function test_input($data)
    {
        $date = trim($data);
        $date = stripslashes($data);
        $date = htmlspecialchars($data);
        return $data;
    }
    
    $sql = "INSERT INTO MyGuest(name, age, job, area)
    VALUES ('$d1','$d2','$d3','$d4')";
    
    if($conn->multi_query($sql) === TRUE)
    {
        echo "New record created successfully";
    }
    else
    {
       echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>

</body>
</html>