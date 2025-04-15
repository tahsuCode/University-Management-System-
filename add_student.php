<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit();
}

if ($_SESSION['usertype'] == 'student') {
    header('location:studenthome.php');
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "universityproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_student'])) {
    $username = trim($_POST['name']);
    $user_email = trim($_POST['email']);
    $user_phone = trim($_POST['phone']);
    $user_password = trim($_POST['password']);

    $usertype = "student";

    // Check if user already exists
    $check_sql = "SELECT * FROM user WHERE username='$username' OR email='$user_email'";
    $check_result = mysqli_query($data, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('User already exists!');</script>";
    } else {
        $sql = "INSERT INTO user(username,email,phone,usertype,password) 
                VALUES('$username','$user_email','$user_phone','$usertype','$user_password')";

        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "<script>
                    alert('Data Uploaded Successfully'); 
                    window.location.href = 'add_student.php'; 
                  </script>";
            exit();
        } else {
            echo "<script>alert('Data Not Uploaded');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
            text-align: left;
            padding-left: 20px;
            border-radius: 10px;
        }
    </style>
    <?php include 'admin_css.php'; ?>
</head>
<body>
    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        
        <center> 
            <h1><u>Add Student</u></h1>

            <div class="div_deg">
                <form action="#" method="post">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name" required>
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone" required>
                    </div>

                    <div>
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>

                    <div style="display: flex; justify-content: center; margin-top: 15px;">
                        <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
