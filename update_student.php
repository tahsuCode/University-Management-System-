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

$id = $_GET['student_id']; // Fixed missing semicolon

// Secure query using prepared statements
$stmt = $data->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$info = $result->fetch_assoc();

// Handle form submission
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $update_stmt = $data->prepare("UPDATE user SET username=?, email=?, phone=?, password=? WHERE id=?");
    $update_stmt->bind_param("ssssi", $username, $email, $phone, $password, $id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Student updated successfully!');</script>";
        echo "<script>window.location.href='view_student.php';</script>";
    } else {
        echo "<script>alert('Update failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include 'admin_css.php'; ?>

    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
<?php include 'admin_sidebar.php'; ?>

<div class="content">
    <center>
        <h1><u>Update Student</u></h1>

        <div class="div_deg">
            <form action="" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $info['username']; ?>">
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $info['email']; ?>">
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" value="<?php echo $info['phone']; ?>">
                </div>

                <div>
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo $info['password']; ?>">
                </div>

                <div>
                    <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>
            </form>
        </div>
    </center>
</div>

</body>
</html>
