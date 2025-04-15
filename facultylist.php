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

// DELETE functionality
if (isset($_GET['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    mysqli_query($conn, "DELETE FROM faculty WHERE id='$delete_id'");
    header("location: facultylist.php");
    exit();
}

// UPDATE functionality
if (isset($_POST['update_faculty'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $degree = mysqli_real_escape_string($conn, $_POST['degree']);

    $update_query = "UPDATE faculty SET name='$name', department='$department', degree='$degree' WHERE id='$id'";
    mysqli_query($conn, $update_query);

    header("location: facultylist.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM faculty");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty List</title>
    <?php include 'admin_css.php'; ?>
    <style>
        body { font-family: Arial, sans-serif; }
        .content { padding: 20px; }
        h1, h2 { color: #333; margin-bottom: 20px; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }

        th { background-color: #007BFF; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        img { width: 80px; height: auto; border-radius: 5px; }

        .action-buttons a {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
        }

        .edit-btn { background-color: #28a745; color: white; }
        .delete-btn { background-color: #dc3545; color: white; }

        /* Edit Faculty Form Styling */
        .edit-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 30px auto;
        }

        .edit-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        .edit-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .edit-form button {
            background-color: #007BFF;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }

        .edit-form button:hover {
            background-color: #0056b3;
        }

        .go-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #6c757d;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
        }

        .go-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<?php include 'admin_sidebar.php'; ?>
<div class="content">
    <h1>Faculty List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Degree</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['department']) ?></td>
                <td><?= htmlspecialchars($row['degree']) ?></td>
                <td>
                    <?php if (!empty($row['image'])): ?>
                        <img src="<?= htmlspecialchars($row['image']) ?>" alt="Image">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td class="action-buttons">
                    <a href="?edit_id=<?= $row['id'] ?>" class="edit-btn">Edit</a>
                    <a href="?delete_id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this faculty?');" class="delete-btn">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php if (isset($_GET['edit_id'])): 
        $edit_id = mysqli_real_escape_string($conn, $_GET['edit_id']);
        $edit_result = mysqli_query($conn, "SELECT * FROM faculty WHERE id='$edit_id'");
        $faculty = mysqli_fetch_assoc($edit_result);
    ?>
        <div class="edit-form">
            <h2>Edit Faculty</h2>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $faculty['id'] ?>">

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($faculty['name']) ?>" required>

                <label for="department">Department:</label>
                <input type="text" id="department" name="department" value="<?= htmlspecialchars($faculty['department']) ?>" required>

                <label for="degree">Degree:</label>
                <input type="text" id="degree" name="degree" value="<?= htmlspecialchars($faculty['degree']) ?>" required>

                <button type="submit" name="update_faculty">Update Faculty</button>
            </form>
            <a href="admin_add_teacher.php" class="go-back">Go Back to Add Faculty</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
