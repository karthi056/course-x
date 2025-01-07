<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['id'])) {
    die("You must log in first.");
}

// Database connection
include 'db.php';

// Get the user ID from the session
$id = $_SESSION['id'];

// Fetch personal details from the `user_personal` table
$queryPersonal = $conn->prepare("SELECT name, age, phone, address, school, ambition, sex, board FROM user_personal WHERE id = ?");
$queryPersonal->bind_param("i", $id);
$queryPersonal->execute();
$resultPersonal = $queryPersonal->get_result();
$personalData = $resultPersonal->fetch_assoc();
$queryPersonal->close();

// Initialize error array
$errors = [];

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name = htmlspecialchars(trim($_POST['name']));
    $age = htmlspecialchars(trim($_POST['age']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $school = htmlspecialchars(trim($_POST['school']));
    $ambition = htmlspecialchars(trim($_POST['ambition']));
    $sex = htmlspecialchars(trim($_POST['sex']));
    $board = htmlspecialchars(trim($_POST['board']));

    // Server-side validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!is_numeric($age) || $age < 1 || $age > 120) {
        $errors[] = "Please enter a valid age between 1 and 120.";
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Please enter a valid 10-digit phone number.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }
    if (empty($school)) {
        $errors[] = "School is required.";
    }
    if (empty($ambition)) {
        $errors[] = "Ambition is required.";
    }

    // If no errors, update the database
    if (empty($errors)) {
        $updateQuery = $conn->prepare("UPDATE user_personal SET name = ?, age = ?, phone = ?, address = ?, school = ?, ambition = ?, sex = ?, board = ? WHERE id = ?");
        $updateQuery->bind_param("sissssssi", $name, $age, $phone, $address, $school, $ambition, $sex, $board, $id);

        if ($updateQuery->execute()) {
            echo "<script>alert('Profile updated successfully!'); window.location.href = 'profile.php';</script>";
        } else {
            $errors[] = "Error updating profile. Please try again.";
        }

        $updateQuery->close();
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("images/hero-bg.jpg") center/cover no-repeat;
        }

        .edit-profile-container {
            width: 500px;
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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"], input[type="number"], select {
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
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
    </style>

    <script>
        // Client-side form validation
        function validateForm() {
            let name = document.forms["profileForm"]["name"].value;
            let age = document.forms["profileForm"]["age"].value;
            let phone = document.forms["profileForm"]["phone"].value;
            let address = document.forms["profileForm"]["address"].value;
            let school = document.forms["profileForm"]["school"].value;
            let ambition = document.forms["profileForm"]["ambition"].value;
            let errorMsg = "";

            if (name === "") {
                errorMsg += "Name is required.\n";
            }
            if (age < 1 || age > 120 || isNaN(age)) {
                errorMsg += "Please enter a valid age between 1 and 120.\n";
            }
            if (!/^\d{10}$/.test(phone)) {
                errorMsg += "Please enter a valid 10-digit phone number.\n";
            }
            if (address === "") {
                errorMsg += "Address is required.\n";
            }
            if (school === "") {
                errorMsg += "School is required.\n";
            }
            if (ambition === "") {
                errorMsg += "Ambition is required.\n";
            }

            if (errorMsg !== "") {
                alert(errorMsg);
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<div class="edit-profile-container">
    <h2>Edit Profile</h2>

    <!-- Display server-side errors -->
    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form name="profileForm" method="POST" action="edit_profile.php" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $personalData['name']; ?>" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $personalData['age']; ?>" required>

        <label for="sex">Sex:</label>
        <select id="sex" name="sex" required>
            <option value="Male" <?php echo ($personalData['sex'] == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($personalData['sex'] == 'Female') ? 'selected' : ''; ?>>Female</option>
        </select>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $personalData['phone']; ?>" required>

        <label for="board">Board:</label>
        <input type="text" id="board" name="board" value="<?php echo $personalData['board']; ?>" required>

        <label for="ambition">Ambition:</label>
        <input type="text" id="ambition" name="ambition" value="<?php echo $personalData['ambition']; ?>" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $personalData['address']; ?>" required>

        <label for="school">School:</label>
        <input type="text" id="school" name="school" value="<?php echo $personalData['school']; ?>" required>

        <button type="submit">Save Changes</button>
    </form>
</div>

</body>
</html>
