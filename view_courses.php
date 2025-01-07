<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

include 'db.php';

// Handle CRUD operations for courses
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action == 'add') {
        $course_name = $_POST['course_name'];
        $subjects = $_POST['subjects'];

        // Validate JSON
        json_decode($subjects);
        if (json_last_error() != JSON_ERROR_NONE) {
            echo "Invalid subjects format";
        } else {
            $stmt = $conn->prepare("INSERT INTO courses (course_name, subjects) VALUES (?, ?)");
            $stmt->bind_param("ss", $course_name, $subjects);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($action == 'delete') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    } elseif ($action == 'update') {
        $id = $_POST['id'];
        $course_name = $_POST['course_name'];
        $subjects = $_POST['subjects'];

        // Validate JSON
        json_decode($subjects);
        if (json_last_error() != JSON_ERROR_NONE) {
            echo "Invalid subjects format";
        } else {
            $stmt = $conn->prepare("UPDATE courses SET course_name = ?, subjects = ? WHERE id = ?");
            $stmt->bind_param("ssi", $course_name, $subjects, $id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Fetch courses
$courses = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: white;
            background: url("images/hero-bg.jpg") center/cover no-repeat;
        }
        .container {
            width: 40%;
            margin: 0 auto;
            padding: 2rem;
            background: transparent;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #4caf50;
        }
        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 1rem;
        }
        input, textarea {
            margin: 0.5rem 0;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 0.75rem;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1565c0;
        }
        .courses-list {
            margin-top: 2rem;
        }
        .course-item {
            padding: 1rem;
            background-color: #f0f4f7;
            margin-bottom: 1rem;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage Courses</h2>

        <!-- Add New Course -->
        <form method="POST">
            <input type="text" name="course_name" placeholder="Course Name" required>
            <textarea name="subjects" placeholder='["subject1", "subject2", ...]' required></textarea>
            <button type="submit" name="action" value="add">Add Course</button>
        </form>

        <!-- Existing Courses -->
        <div class="courses-list">
            <?php while ($course = $courses->fetch_assoc()) { ?>
                <div class="course-item">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $course['id']; ?>">
                        <input type="text" name="course_name" value="<?php echo htmlspecialchars($course['course_name']); ?>" required>
                        <textarea name="subjects" required><?php echo htmlspecialchars($course['subjects']); ?></textarea>
                        <button type="submit" name="action" value="update">Update</button>
                        <button type="submit" name="action" value="delete" style="background-color: #d32f2f;">Delete</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
