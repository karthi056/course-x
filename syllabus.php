<?php
include 'db.php'; // Include the database connection

// Get the course_id from the URL
$course_id = isset($_GET['course_id']) ? $_GET['course_id'] : null;

// Fetch course name based on the course_id
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

// Fetch the syllabus for the selected course, grouped by semester
$sql = "SELECT semester, topic FROM syllabus WHERE course_name = ? ORDER BY semester ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $course['course_name']);
$stmt->execute();
$syllabusResult = $stmt->get_result();

// Store the syllabus in an associative array grouped by semester
$syllabus_by_semester = [];
while ($row = $syllabusResult->fetch_assoc()) {
    $syllabus_by_semester[$row['semester']][] = $row['topic'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['course_name']); ?> - Syllabus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("images/hero-bg.jpg") center/cover no-repeat;
            padding: 20px;
            color:white;
            max-width: 800px;
            min-height:100vh;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: white;
        }
        h2 {
            color: white;
            margin-top: 20px;
        }
        ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<h1><?php echo htmlspecialchars($course['course_name']); ?> - Syllabus</h1>

<?php if (!empty($syllabus_by_semester)): ?>
    <?php foreach ($syllabus_by_semester as $semester => $topics): ?>
        <h2>Semester <?php echo $semester; ?></h2>
        <ul>
            <?php foreach ($topics as $topic): ?>
                <li><?php echo htmlspecialchars($topic); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
<?php else: ?>
    <p>No syllabus found for this course.</p>
<?php endif; ?>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>


