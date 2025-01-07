<?php
include 'db.php';

// Get course ID from URL
$course_id = $_GET['course_id'];

// Fetch course name
$sql = "SELECT course_name FROM courses WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $course_id);
$stmt->execute();
$courseResult = $stmt->get_result();
$course = $courseResult->fetch_assoc();

// If course is not found, handle the error
if (!$course) {
    echo "Course not found.";
    exit();
}

// Fetch colleges that offer this course
$sql = "SELECT college_name FROM colleges WHERE JSON_CONTAINS(courses_offered, ?, '$')";
$stmt = $conn->prepare($sql);

// Bind the course name to the query and execute
$course_name_json = json_encode($course['course_name']); // Convert the course name to valid JSON format
$stmt->bind_param('s', $course_name_json);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['course_name']); ?> - Colleges</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            color:white;
            background: url("images/hero-bg.jpg") center/cover no-repeat;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            min-height: 100vh;
        }
        h1 {
            margin-bottom: 20px;
        }
        ul {
            list-style-type: disc;
            padding-left: 20px;
            color:black;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            width: 50%;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h1><?php echo htmlspecialchars($course['course_name']); ?> - Colleges Offering This Course</h1>

<ul>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($college = $result->fetch_assoc()): ?>
            <li><?php echo htmlspecialchars($college['college_name']); ?></li>
        <?php endwhile; ?>
    <?php else: ?>
        <li>No colleges found offering this course.</li>
    <?php endif; ?>
</ul>

</body>
</html>

<?php 
$stmt->close();
$conn->close(); 
?>

