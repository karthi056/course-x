<?php
include 'db.php'; // Include your database connection file

// Fetch all courses from the 'courses' table
$sql = "SELECT id, course_name FROM courses";
$result = $conn->query($sql);

$courses = []; // Array to hold all courses

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = ['id' => $row['id'], 'name' => $row['course_name']];
    }
} else {
    $courses = []; // No courses found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    <style>
        body {
            background: url("images/hero-bg.jpg") center/cover no-repeat;
            color: white; /* White text for readability */
            font-family: 'Arial', sans-serif; /* Clean and standard font */
            display: flex;
            justify-content: center; /* Horizontally center */
            align-items: center; /* Vertically center */
            flex-direction: column; /* Stack content vertically */
            height: 100vh; /* Full viewport height */
            margin: 0;
            text-align: center; /* Center-align text */
        }
        h1 {
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none; /* Remove bullet points */
            padding: 0;
        }
        li {
            margin-bottom: 10px; /* Spacing between list items */
        }
        a {
            color: #1e90ff; /* Blue link color */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline; /* Underline link on hover */
        }
    </style>
</head>
<body>
    <h1>All Courses</h1>

    <ul>
        <?php if (count($courses) > 0): ?>
            <?php foreach ($courses as $course): ?>
                <li>
                    <?= htmlspecialchars($course['name']) ?> 
                    <a href='course.php?course_id=<?= $course['id'] ?>'>Click here</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No courses found.</li>
        <?php endif; ?>
    </ul>

</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
