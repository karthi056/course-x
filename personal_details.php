<?php
session_start();

if (!isset($_SESSION['id'])) {
    die("You must register first to provide personal details.");
}

// Database connection
include 'db.php';

// Initialize variables for error messages
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user ID from session
    $id = $_SESSION['id'];
    
    // Retrieve personal details from the form and sanitize inputs
    $name = trim($_POST['name']);
    $age = intval($_POST['age']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $school = trim($_POST['school']);
    $ambition = trim($_POST['ambition']);
    $sex = trim($_POST['sex']);
    $board = trim($_POST['board']);

    // Server-side validation
    if (empty($name)) $errors[] = "Name is required.";
    if ($age <= 0) $errors[] = "Age must be a valid number greater than zero.";
    if (!preg_match('/^\d{10}$/', $phone)) $errors[] = "Phone number must be a valid 10-digit number.";
    if (empty($address)) $errors[] = "Address is required.";
    if (empty($school)) $errors[] = "School is required.";
    if (empty($ambition)) $errors[] = "Ambition is required.";
    if (empty($sex)) $errors[] = "Sex is required.";
    if (empty($board)) $errors[] = "Board of Study is required.";

    // If no errors, insert into database
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO user_personal (id, name, age, phone, address, school, ambition, sex, board) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isissssss", $id, $name, $age, $phone, $address, $school, $ambition, $sex, $board);

        if ($stmt->execute()) {
            // Redirect to user.html on successful submission
            header('Location: user.html');
            exit(); // Prevent further execution
        } else {
            $errors[] = "Database error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            background: url("images/hero-bg.jpg") center/cover repeat;
        }

        .form-container {
            width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            margin: 10px 0 5px;
            display: block;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Personal Details Form</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo isset($age) ? htmlspecialchars($age) : ''; ?>" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo isset($address) ? htmlspecialchars($address) : ''; ?>" required>

        <label for="school">School Previously Studied:</label>
        <input type="text" id="school" name="school" value="<?php echo isset($school) ? htmlspecialchars($school) : ''; ?>" required>

        <label for="ambition">Ambition:</label>
        <input type="text" id="ambition" name="ambition" value="<?php echo isset($ambition) ? htmlspecialchars($ambition) : ''; ?>" required>

        <label for="sex">Sex:</label>
        <select id="sex" name="sex" required>
            <option value="male" <?php echo isset($sex) && $sex == 'male' ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo isset($sex) && $sex == 'female' ? 'selected' : ''; ?>>Female</option>
            <option value="other" <?php echo isset($sex) && $sex == 'other' ? 'selected' : ''; ?>>Other</option>
        </select>

        <label for="board">Board of Study:</label>
        <select id="board" name="board" required>
            <option value="CBSE" <?php echo isset($board) && $board == 'CBSE' ? 'selected' : ''; ?>>CBSE</option>
            <option value="ICSE" <?php echo isset($board) && $board == 'ICSE' ? 'selected' : ''; ?>>ICSE</option>
            <option value="State Board" <?php echo isset($board) && $board == 'State Board' ? 'selected' : ''; ?>>State Board</option>
            <option value="Other" <?php echo isset($board) && $board == 'Other' ? 'selected' : ''; ?>>Other</option>
        </select>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
