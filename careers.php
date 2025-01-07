<?php
include 'db.php';

// Get the course ID from the URL
$course_id = $_GET['course_id'];

// Fetch career details for the course
$sql = "SELECT course_name, jobs FROM careers WHERE id = $course_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $career = $result->fetch_assoc();
    $course_name = $career['course_name'];

    // Decode jobs JSON, but check if it's not null or empty
    $jobs = !empty($career['jobs']) ? json_decode($career['jobs'], true) : null;
} else {
    echo "No career opportunities found for this course.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($course_name) ?> - Career Opportunities</title> <!-- Escaped for security -->
    <style>
        body {
            font-family: Arial, sans-serif;
            color: white; /* Ensure text is readable over the background image */
            background: url("images/hero-bg.jpg") center/cover no-repeat; /* Background image */
            text-align: center;
            padding: 50px;
            min-height:100vh;
        }
        h1 {
            color: white; /* Ensure header is visible against the background */
        }
        ul {
            list-style-type: disc; /* Use bullets for the list */
            padding-left: 20px; /* Add padding to the left to align bullets properly */
            text-align: left;
            max-width: 600px;
            margin: 0 auto;
        }
        li {
            background: #fff;
            color: #000; /* Ensure the text in list items is readable */
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<h1><?= htmlspecialchars($course_name) ?> - Career Opportunities</h1>

<?php if ($jobs && is_array($jobs)): ?>
    <ul>
        <?php foreach ($jobs as $job): ?>
            <li><?= htmlspecialchars($job) ?></li> <!-- Each job displayed as a separate list item without quotes -->
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No career opportunities found for this course.</p>
<?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>





