 
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit(); // Prevent further script execution
}

if ($_SESSION['usertype'] == 'student') {
    header('location:studenthome.php');
    exit();
}


$host="localhost";
$user="root";
$password="";
$db="universityproject";

$data=mysqli_connect($host,$user,$password,$db);

$sql="select * from admission";

$result=mysqli_query($data,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Dashboard</title>
     <?php
include 'admin_css.php';
     ?>
</head>
<body>
     <?php
     include 'admin_sidebar.php';
     ?>

<div class="content">
    <center>
    <h1><u> Applied For Admission</u></h1>
    <br>
     <table border="1px">
        <tr>
            <th style="padding:20px; font: size 15px;"> Name</th>
            <th style="padding:20px; font: size 15px;"> Email</th>
            <th style="padding:20px; font: size 15px;"> Phone</th>
            <th style="padding:20px; font: size 15px;"> Message</th>
            </tr>
<?php
while($info=mysqli_fetch_assoc($result)){
?>


<tr>
    <td style="padding:20px;"><?php echo "{$info['name']}"; ?></td>
    <td style="padding:20px;"><?php echo "{$info['email']}"; ?></td>
    <td style="padding:20px;"><?php echo "{$info['phone']}"; ?></td>
    <td style="padding:20px;"><?php echo "{$info['message']}"; ?></td>
</tr>

<?php
}
?>
 

</table>
</center>
</div>



</body>
</html>
