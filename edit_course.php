<?php
// Database connection (no config.php used)
$host = "localhost";
$user = "root";
$password = ""; // Set your MySQL password if any
$database = "universityproject"; // Set your actual database name

$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if edit_id is provided
if (isset($_GET['edit_id'])) {
    $id = intval($_GET['edit_id']);

    $stmt = mysqli_prepare($conn, "SELECT * FROM courses WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$row) {
        echo "<script>alert('Course not found'); window.location.href = 'view_courses.php';</script>";
        exit();
    }
}

// Update Course
if (isset($_POST['update_course'])) {
    $id = intval($_POST['id']);

    $course_name = trim($_POST['course_name']);
    $course_code = trim($_POST['course_code']);
    $department = trim($_POST['department']);
    $credits = trim($_POST['credits']);
    $instructor = trim($_POST['instructor']);
    $semester = trim($_POST['semester']);
    $description = trim($_POST['description']);

    $stmt = mysqli_prepare($conn, "UPDATE courses SET 
        course_name=?, course_code=?, department=?, credits=?, instructor=?, semester=?, description=? 
        WHERE id=?");

    mysqli_stmt_bind_param($stmt, "sssssssi", 
        $course_name, $course_code, $department, $credits, $instructor, $semester, $description, $id
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Course Updated Successfully'); window.location.href = 'view_courses.php';</script>";
    } else {
        echo "<script>alert('Update Failed');</script>";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select, textarea {
            width: 300px;
            padding: 5px;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 8px 16px;
        }
    </style>
</head>
<body>
    <h2>Edit Course</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <label>Course Name:</label>
        <input type="text" name="course_name" value="<?= htmlspecialchars($row['course_name']) ?>" required>

        <label>Course Code:</label>
        <input type="text" name="course_code" value="<?= htmlspecialchars($row['course_code']) ?>" required>

        <label>Department:</label>
        <input type="text" name="department" value="<?= htmlspecialchars($row['department']) ?>" required>

        <label>Credits:</label>
        <input type="number" name="credits" value="<?= htmlspecialchars($row['credits']) ?>" required>

        <label>Instructor:</label>
        <input type="text" name="instructor" value="<?= htmlspecialchars($row['instructor']) ?>" required>

        <label>Semester:</label>
        <select name="semester">
            <option value="Spring" <?= $row['semester'] == 'Spring' ? 'selected' : '' ?>>Spring</option>
            <option value="Summer" <?= $row['semester'] == 'Summer' ? 'selected' : '' ?>>Summer</option>
            <option value="Fall" <?= $row['semester'] == 'Fall' ? 'selected' : '' ?>>Fall</option>
        </select>

        <label>Description:</label>
        <textarea name="description"><?= htmlspecialchars($row['description']) ?></textarea>

        <input type="submit" name="update_course" value="Update Course">
    </form>
</body>
</html>
