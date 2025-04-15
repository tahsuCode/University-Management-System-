<?php
// Database Connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "universityproject";
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Fetch courses
$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f0ff;
            font-size: 1.1rem;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        }
        table {
            margin-top: 20px;
        }
        th {
            background-color: #007bff !important; /* Blue background */
            color: white !important; /* White text */
            text-align: center;
        }
        td {
            text-align: center;
        }
        .btn-back {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Back Button -->
    <a href="adminhome.php" class="btn btn-secondary btn-back">Back</a>

    <h2 class="text-center mb-4">View Courses</h2>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Code</th>
                <th>Department</th>
                <th>Credits</th>
                <th>Instructor</th>
                <th>Semester</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['course_name']; ?></td>
                        <td><?= $row['course_code']; ?></td>
                        <td><?= $row['department']; ?></td>
                        <td><?= $row['credits']; ?></td>
                        <td><?= $row['instructor']; ?></td>
                        <td><?= $row['semester']; ?></td>
                        <td><?= $row['description']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8">No courses found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
