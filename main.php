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
<h2>Household Ledger</h2> 

<ul>
    <li><a href="main.php">HOME</a></li>
     <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">SIGN UP</a>
        <div class="dropdown-content">
            <a href="signup.html">SIGN UP</a>
        </div>
    </li>
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
<p></p>
<p></p>

<?php
    require_once 'login.php';
    $connection= new mysqli($hn,$un,$pw,$db);
    
    if($connection->connect_error) die ($connection->connect_error);
    
    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
    {
        $un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
        $pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);
        
        $query = "SELECT * FROM users WHERE username='$un_temp'";
        $result = $connection->query($query);
        
        if(!$result) die($connection->error);
        elseif($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
            $salt1="qm&h*";
            $salt2="pg!@";
            $token = hash('ripemd128', "$salt1$pw_temp$salt2");
            
            if($token == $row[3])
            {
                session_start();
                $_SESSION['username'] = $un_temp;
                $_SESSION['password'] = $pw_temp;
                $_SESSION['forename'] = $row[0];
                $_SESSION['surname'] = $row[1];
                //echo "$row[0] $row[1] : Hi $row[0], you are now logged in as '$row[2]'";
            }
            else die("Invalid username/password combination");
        }
        else die("Invalid username/password combination");
    }
        else
        {
            header('WWW-Authenticate: Basic realm="Restricted Section"');
            header('HTTP/1.0 401 Unauthorized');
            die("Please enter your username and password");
        }
        $connection->close();
        
        function mysql_entities_fix_string($connection,$string)
        {
            return htmlentities(mysql_fix_string($connection,$string));
        }
    
        
        function mysql_fix_string($connection,$string)
        {
            if(get_magic_quotes_gpc()) $string = stripslashes($string);
            return $connection->real_escape_string($string);
        }
?>

<video width="400" controls>
    <source src="mov_bbb.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<p>
Video courtesy of
<a href="https://www.bigbuckbunny.org/" target="_blank">Big Buck Bunny</a>
</p>


</body>
</html>
            