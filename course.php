<?php
include 'db.php';

// Get the course ID from the URL
$course_id = $_GET['course_id'];

// Fetch course details
$sql = "SELECT * FROM courses WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $course_id);
$stmt->execute();
$result = $stmt->get_result();
$course = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['course_name']); ?></title>
    <style>
        body {
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("images/hero-bg.jpg") center/cover no-repeat;
            padding-top: 50px; /* Move heading higher */
        }
        h1 {
            margin-bottom: 20px;
            font-size: 2.5em; /* Increase font size */
        }
        .button-container {
            display: flex;
            flex-direction: column; /* Arrange buttons in a column */
            gap: 20px;
            width: 100%; /* Full width for buttons */
            max-width: 300px; /* Limit button width */
        }
        button {
            padding: 20px; /* Increase padding for larger buttons */
            font-size: 18px; /* Larger font size */
            cursor: pointer;
            border: none;
            border-radius: 8px;
            background-color: #007bff;
            color: white;
            display: flex; /* Flexbox for icon alignment */
            align-items: center; /* Center icon and text */
            justify-content: center; /* Center icon and text */
            gap: 10px; /* Space between icon and text */
        }
        button:hover {
            background-color: #0056b3;
        }
        .icon {
            font-size: 24px; /* Icon size */
        }
    </style>
</head>
<body>

<h1><?php echo htmlspecialchars($course['course_name']); ?></h1>

<div class="button-container">
    <button onclick="window.location.href='syllabus.php?course_id=<?php echo $course_id; ?>'">
        <span class="icon">📚</span> Syllabus
    </button>
    <button onclick="window.location.href='careers.php?course_id=<?php echo $course_id; ?>'">
        <span class="icon">💼</span> Career
    </button>
    <button onclick="window.location.href='colleges.php?course_id=<?php echo $course_id; ?>'">
        <span class="icon">🏫</span> Colleges
    </button>
</div>

</body>
</html>

<?php $conn->close(); ?>




