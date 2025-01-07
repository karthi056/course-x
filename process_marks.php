<?php
include 'db.php';

// Sanitize user input
$board = htmlspecialchars($_POST['board']);
$subjects = array_map('htmlspecialchars', [$_POST['subject1'], $_POST['subject2'], $_POST['subject3'], $_POST['subject4'], $_POST['subject5'], $_POST['subject6']]);
$marks = array_map('htmlspecialchars', [$_POST['marks1'], $_POST['marks2'], $_POST['marks3'], $_POST['marks4'], $_POST['marks5'], $_POST['marks6']]);

$bestChoices = [];
$goodChoices = [];
$otherChoices = [];

// Sort subjects based on board and marks
if ($board == 'ICSE' || $board == 'STATE') {
    array_multisort($marks, SORT_DESC, $subjects);
    $selectedSubjects = array_slice($subjects, 0, 4);
} elseif ($board == 'CBSE') {
    $gradeValues = ['A1' => 9, 'A2' => 8, 'B1' => 7, 'B2' => 6, 'C1' => 5, 'C2' => 4, 'D1' => 3, 'D2' => 2, 'F' => 0];
    $marks = array_map(function($grade) use ($gradeValues) {
        return $gradeValues[$grade] ?? 0;
    }, $marks);
    array_multisort($marks, SORT_DESC, $subjects);
    $selectedSubjects = array_slice($subjects, 0, 4);
}

// Fetch matching courses
$sql = "SELECT id, course_name, subjects FROM courses"; // Added id to select
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courseSubjects = json_decode($row['subjects'], true);
        $matchCount = 0;
        foreach ($selectedSubjects as $subject) {
            if (in_array($subject, $courseSubjects)) {
                $matchCount++;
            }
        }

        if ($matchCount == 4) {
            $bestChoices[] = ['name' => $row['course_name'], 'id' => $row['id']];
        } elseif ($matchCount == 3) {
            $goodChoices[] = ['name' => $row['course_name'], 'id' => $row['id']];
        } else {
            $otherChoices[] = ['name' => $row['course_name'], 'id' => $row['id']];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Recommendations</title>
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
        h2 {
            margin-bottom: 15px;
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
    <div>
        <h2>Best Choices</h2>
        <ul>
            <?php if (count($bestChoices) > 0): ?>
                <?php foreach ($bestChoices as $course): ?>
                    <li><?= htmlspecialchars($course['name']) ?> <a href='course.php?course_id=<?= $course['id'] ?>'>Click here</a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No best choices found.</li>
            <?php endif; ?>
        </ul>

        <h2>Good Choices</h2>
        <ul>
            <?php if (count($goodChoices) > 0): ?>
                <?php foreach ($goodChoices as $course): ?>
                    <li><?= htmlspecialchars($course['name']) ?> <a href='course.php?course_id=<?= $course['id'] ?>'>Click here</a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No good choices found.</li>
            <?php endif; ?>
        </ul>

        <h2>Other Choices</h2>
        <ul>
            <?php if (count($otherChoices) > 0): ?>
                <?php foreach ($otherChoices as $course): ?>
                    <li><?= htmlspecialchars($course['name']) ?> <a href='course.php?course_id=<?= $course['id'] ?>'>Click here</a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No other choices found.</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>

<?php
$conn->close();
?>


