<?php

session_start();

$user = 'root';
$password = 'password'; //To be completed if you have set a password to root
$database = 'mockboardf'; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port
$mysqli = new mysqli('localhost', $user, $password, $database, $port);


if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
echo '<p>Connection OK '. $mysqli->host_info.'</p>';
echo '<p>Server '.$mysqli->server_info.'</p>';


$name = $_POST['user'];
$pass = $_POST['password'];

$s = "select * from login where email ='$name' && number = '$pass'";
//$b = "select name from usertable where password = '$pass'";
$result = mysqli_query($mysqli, $s);
//$result1 = mysqli_query($mysqli, $b);
//$row = mysqli_fetch_array($result1);
//$n = $row['name'];
$num = mysqli_num_rows($result);

if($num ==1)
{
  $_SESSION['username'] = $name;
  header('location:home/home.php');
}
else{
  header('location:index.php?match=fail');
}

















$mysqli->close();
?>
