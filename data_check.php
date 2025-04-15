<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "universityproject";

// Connect to database
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['apply'])) {
    $data_name = trim($_POST['name']);
    $data_email = trim($_POST['email']);
    $data_phone = trim($_POST['phone']);
    $data_message = trim($_POST['message']);

    // Optional: Basic validation
    if (empty($data_name) || empty($data_email) || empty($data_phone)) {
        echo "<script>alert('Please fill all required fields'); window.location.href='admission.php';</script>";
        exit();
    }

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO admission (name, email, phone, message) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($data, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $data_name, $data_email, $data_phone, $data_message);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>
                    alert('Application Submitted Successfully!');
                    window.location.href='index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Something went wrong. Please try again.');
                    window.location.href='index.php';
                  </script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Failed to prepare the statement'); window.location.href='admission.php';</script>";
    }
}
?>
