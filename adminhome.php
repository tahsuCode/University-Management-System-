<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #007BFF;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar {
            width: 220px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .dashboard-header {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #333;
        }

        .card p {
            font-size: 22px;
            font-weight: bold;
            color: #007BFF;
        }

        .quick-links {
            margin-top: 40px;
        }

        .quick-links button {
            background-color: #28a745;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin: 5px;
            font-size: 14px;
        }

        .quick-links button:hover {
            background-color: #218838;
        }

        .announcements {
            margin-top: 40px;
            background-color: #fff3cd;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ffeeba;
        }

        .announcements h4 {
            margin-bottom: 10px;
            color: #856404;
        }

        .search-bar {
            margin: 20px 0;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Admin Dashboard</h2>
        <button onclick="location.href='logout.php'" style="background-color:#dc3545; color:white; padding:10px 16px; border:none; border-radius:6px; cursor:pointer;">Log Out</button>
    </div>

    <div class="sidebar">
        <a href="adminhome.php">Dashboard</a>
        <a href="add_student.php">Add Student</a>
        <a href="view_student.php">View Student</a>
        <a href="add_teacher.php">Add Faculty</a>
        <a href="facultylist.php">View Faculty</a>
        <a href="add_course.php">Add Courses</a>
        <a href="view_courses.php">View Courses</a>
    </div>

    <div class="content">
        <div class="dashboard-header">Welcome, Admin! Here's today's overview:</div>

        <div class="card-container">
            <div class="card">
                <h3>Total Students</h3>
                <p>120</p>
            </div>
            <div class="card">
                <h3>Total Faculty</h3>
                <p>25</p>
            </div>
            <div class="card">
                <h3>Total Courses</h3>
                <p>15</p>
            </div>
            <div class="card">
                <h3>New Admissions</h3>
                <p>10</p>
            </div>
        </div>

        <div class="quick-links">
            <h3>Quick Links</h3>
            <button onclick="location.href='add_student.php'">➕ Add Student</button>
            <button onclick="location.href='admin_add_teacher.php'">➕ Add Faculty</button>
            <button onclick="location.href='add_course.php'">➕ Add Course</button>
            <button onclick="location.href='generate_reports.php'">📄 Generate Reports</button>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="🔍 Search for students, faculty, or courses...">
        </div>

        <div class="announcements">
            <h4>📢 Announcements:</h4>
            <ul>
                <li>Upcoming exams start on 10th March.</li>
                <li>Faculty meeting scheduled for 5th March at 2 PM.</li>
                <li>Last date for course registrations: 28th February.</li>
            </ul>
        </div>
    </div>
</body>
</html>
