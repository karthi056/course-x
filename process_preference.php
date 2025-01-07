<?php
include 'db.php';

// Get subjects from form
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];
$subject4 = $_POST['subject4'];

// Fetch matching courses from the 'courses' table
$sql = "SELECT id, course_name, subjects FROM courses";
$result = $conn->query($sql);

$bestChoices = [];
$goodChoices = [];
$otherChoices = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $subjects = json_decode($row['subjects'], true);
        $matchCount = 0;

        if (in_array($subject1, $subjects)) $matchCount++;
        if (in_array($subject2, $subjects)) $matchCount++;
        if (in_array($subject3, $subjects)) $matchCount++;
        if (in_array($subject4, $subjects)) $matchCount++;

        // Prepare course details (name and id) for different match cases
        $courseDetails = ['id' => $row['id'], 'name' => $row['course_name']];

        if ($matchCount == 4) {
            $bestChoices[] = $courseDetails;
        } elseif ($matchCount == 3) {
            $goodChoices[] = $courseDetails;
        } else {
            $otherChoices[] = $courseDetails;
        }
    }
}

// Output results
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <style>
        body {
            background: url("images/hero-bg.jpg") center/cover no-repeat;
            color: white; /* White text for readability */
            font-family: 'Arial', sans-serif; /* Clean, standard font */
            display: flex;
            justify-content: center; /* Horizontally center */
            align-items: center; /* Vertically center */
            flex-direction: column; /* Align content in a column */
            height: 100vh; /* Full viewport height */
            margin: 0;
            text-align: center; /* Center-align text */
        }
        h2, h3 {
            margin: 10px 0;
        }
        ul {
            list-style: none; /* Remove bullet points */
            padding: 0;
        }
        li {
            margin: 5px 0; /* Spacing between list items */
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
    <h2>Results Based on Your Preferences</h2>

    <h3>Best Choices:</h3>
    <ul>
        <?php if (count($bestChoices) > 0): ?>
            <?php foreach ($bestChoices as $course): ?>
                <li><?= $course['name'] ?> <a href='course.php?course_id=<?= $course['id'] ?>'>Click here</a></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No best matches found.</li>
        <?php endif; ?>
    </ul>

    <h3>Good Choices:</h3>
    <ul>
        <?php if (count($goodChoices) > 0): ?>
            <?php foreach ($goodChoices as $course): ?>
                <li><?= $course['name'] ?> <a href='course.php?course_id=<?= $course['id'] ?>'>Click here</a></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No good matches found.</li>
        <?php endif; ?>
    </ul>

    <h3>Other Choices:</h3>
    <ul>
        <?php if (count($otherChoices) > 0): ?>
            <?php foreach ($otherChoices as $course): ?>
                <li><?= $course['name'] ?> <a href='course.php?course_id=<?= $course['id'] ?>'>Click here</a></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No other matches found.</li>
        <?php endif; ?>
    </ul>

</body>
</html>

<?php
$conn->close();
?>

