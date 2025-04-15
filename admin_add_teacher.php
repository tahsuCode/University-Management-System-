<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit();
}
if ($_SESSION['usertype'] === 'student') {
    header('location:studenthome.php');
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "universityproject";

$conn = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_faculty'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $degree = mysqli_real_escape_string($conn, $_POST['degree']);

    $file = $_FILES['image']['name'];
    $dst_db = "";

    if (!empty($file)) {
        $dst = "./image/" . $file;
        move_uploaded_file($_FILES['image']['tmp_name'], $dst);
        $dst_db = $dst;
    }

    $sql = "INSERT INTO faculty (name, department, degree, image) VALUES ('$name', '$department', '$degree', '$dst_db')";
    mysqli_query($conn, $sql);

    header("location: facultylist.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Faculty</title>
    <?php include 'admin_css.php'; 
    ?>
    <style>
        
        body { font-family: Arial, sans-serif; }
        .content { max-width: 500px; margin: auto; padding: 20px; background-color: #f9f9f9; border-radius: 10px; }
        h1 { color: #333; margin-bottom: 20px; }
        label { display: block; margin: 10px 0 5px; font-weight: bold; }
        input[type="text"], input[type="file"] {
            width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007BFF; color: white; border: none; padding: 10px 20px;
            cursor: pointer; border-radius: 5px; margin-top: 15px;
        }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
<?php include 'admin_sidebar.php'; ?>
<div class="content">
    <h1>Add Faculty</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Faculty Name:</label>
        <input type="text" name="name" required>

        <label>Department:</label>
        <input type="text" name="department" required>

        <label>Degree:</label>
        <input type="text" name="degree" required>

        <label>Image:</label>
        <input type="file" name="image">

        <input type="submit" name="add_faculty" value="Add Faculty">
    </form>
</div>
</body>
</html>