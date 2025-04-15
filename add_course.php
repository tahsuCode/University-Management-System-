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

// Handle Course Submission
if (isset($_POST['add_course'])) {
    $course_name = trim($_POST['course_name']);
    $course_code = trim($_POST['course_code']);
    $department = trim($_POST['department']);
    $credits = trim($_POST['credits']);
    $instructor = trim($_POST['instructor']);
    $semester = trim($_POST['semester']);
    $description = trim($_POST['description']);

    $sql = "INSERT INTO courses (course_name, course_code, department, credits, instructor, semester, description) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssisss", $course_name, $course_code, $department, $credits, $instructor, $semester, $description);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Course Added Successfully');</script>";
    } else {
        echo "<script>alert('Failed to Add Course');</script>";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f0ff;
            font-size: 1.1rem;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        }
        label {
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-custom {
            margin-top: 10px;
            padding: 10px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 47%;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        .btn-back {
            background: #6c757d;
        }
        .btn-back:hover {
            background: #5a6268;
        }
        .btn-next, .btn-submit {
            background: #007bff;
        }
        .btn-next:hover, .btn-submit:hover {
            background: #0056b3;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Back & Next Buttons in the Same Row -->
    <div class="button-container">
        <a href="adminhome.php" class="btn btn-custom btn-back">Back</a>
        <a href="view_courses.php" class="btn btn-custom btn-next">Next</a>
    </div>

    <h2 class="text-center">Add Course</h2>
    <form action="add_course.php" method="post">
        <label>Course Name:</label>
        <input type="text" name="course_name" required>

        <label>Course Code:</label>
        <input type="text" name="course_code" required>

        <label>Department:</label>
        <input type="text" name="department" required>

        <label>Credits:</label>
        <input type="number" name="credits" required>

        <label>Instructor:</label>
        <input type="text" name="instructor" required>

        <label>Semester:</label>
        <select name="semester">
            <option value="Spring">Spring</option>
            <option value="Summer">Summer</option>
            <option value="Fall">Fall</option>
        </select>

        <label>Description:</label>
        <textarea name="description"></textarea>

        <!-- Add Course Button -->
        <button type="submit" name="add_course" class="btn-custom btn-submit">Add Course</button>
    </form>
</div>

</body>
</html>
