<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$host="localhost";
$user="root";
$password="";
$db="universityproject";
$data = mysqli_connect($host,$user,$password,$db);

if($data === false) {
    die("Connection failed: " . mysqli_connect_error());
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name =$_POST['username'];
$pass =$_POST['password'];

$sql = "SELECT * FROM user WHERE username='$name' AND password='$pass'";
error_log("Attempting login with username: $name and password: $pass");



$result = mysqli_query($data,$sql);
if(!$result) {
    die("Query failed: " . mysqli_error($data));
}
$row = mysqli_fetch_array($result);




if($row)
{
    if($row["usertype"]=="student")

{
    $_SESSION['username']=$name;
    $_SESSION['usertype']="student";

header("Location: studenthome.php");
exit();

}
elseif($row["usertype"]=="admin")
{
    $_SESSION['username']=$name;
    $_SESSION['usertype']="admin";
header("Location: adminhome.php");
exit();

}
else{
    
    $message= "username or password do not match";
    $_SESSION['loginMessage']=$message;
header("Location: login.php");
exit();

}
}
}
?>
