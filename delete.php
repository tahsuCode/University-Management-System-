<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="universityproject";

$data=mysqli_connect($host,$user,$password,$db);
if($_GET['student_id'])
{
    $user_id=$_GET['student_id'];
    $query="DELETE FROM user WHERE id='$user_id'";
    $result=mysqli_query($data,$query);
    if($result)
    {
        $_SESSION['message']='Delete Student is Successful';
        header("location:view_student.php");
    }
}

?>