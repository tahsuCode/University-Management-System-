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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <?php
     include 'student_css.php'
     ?> 
</head>
<body>
     <?php
     include 'student_sidebar.php'
     ?>

<div class="content">
    <h1><u> Student INFO</u></h1>
    <p>
    A Student Dashboard is a user-friendly platform designed to provide students with easy access to essential academic information and resources. It serves as a centralized hub where students can view their course schedules, assignments, grades, announcements, and upcoming deadlines. Interactive features such as progress tracking, notifications, and personalized learning resources help students stay organized and engaged.
    <br> With seamless integration of learning materials, discussion forums, and communication tools, the student dashboard enhances the overall learning experience. Designed for efficiency and accessibility, it enables students to manage their academic journey effectively in a structured and interactive environment.



    </p>
    <input type="text" name="">

</div>



</body>
</html>
