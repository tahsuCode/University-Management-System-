<?php
session_start();

// If the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit();
}

// If the logged-in user is an admin, redirect to the admin dashboard
if ($_SESSION['usertype'] == 'admin') {
    header('location:adminhome.php');
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "universityproject";

$data = mysqli_connect($host, $user, $password, $db);

// Fetch user details
$name = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$name'";
$result = mysqli_query($data, $sql);

$info = ($result && mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result) : [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updated_email = mysqli_real_escape_string($data, $_POST['email']);
    $updated_phone = mysqli_real_escape_string($data, $_POST['phone']);
    $updated_password = mysqli_real_escape_string($data, $_POST['password']);

    // Update query
    $update_sql = "UPDATE user SET email='$updated_email', phone='$updated_phone', password='$updated_password' WHERE username='$name'";
    
    if (mysqli_query($data, $update_sql)) {
        echo "<script>alert('Profile updated successfully!');</script>";
        echo "<script>window.location.href='student_profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <?php include 'student_css.php'; ?> 

    <style>
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 500px;
            padding: 40px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<?php include 'student_sidebar.php'; ?>

<div class="content">
    <center>
        <h1>Update Profile</h1>
        <br>

        <form method="POST" action="#">
            <div class="div_deg">
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo isset($info['email']) ? htmlspecialchars($info['email']) : ''; ?>" required>
                </div>

                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo isset($info['phone']) ? htmlspecialchars($info['phone']) : ''; ?>" required>
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo isset($info['password']) ? htmlspecialchars($info['password']) : ''; ?>" required>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
                </div>
            </div>
        </form>
    </center>
</div>

</body>
</html>
