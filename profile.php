<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['id'])) {
    die("You must log in first.");
}

// Database connection
include 'db.php';

// Get the user ID from session
$id = $_SESSION['id'];

// Fetch user details from the `users` table
$queryUser = $conn->prepare("SELECT Email FROM users WHERE id = ?");
$queryUser->bind_param("i", $id);
$queryUser->execute();
$resultUser = $queryUser->get_result();
$userData = $resultUser->fetch_assoc();
$queryUser->close();  // Close the first query

// Fetch personal details from the `user_personal` table
$queryPersonal = $conn->prepare("SELECT name, age, phone, address, school, ambition, sex, board FROM user_personal WHERE id = ?");
$queryPersonal->bind_param("i", $id);
$queryPersonal->execute();
$resultPersonal = $queryPersonal->get_result();
$personalData = $resultPersonal->fetch_assoc();
$queryPersonal->close();  // Close the second query

// Close the database connection (optional, only if no more queries are needed)
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            
            background: url("images/hero-bg.jpg") center/cover no-repeat;
        }

        .profile-container {
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

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }

        .edit-button {
            text-align: right;
            margin-top: 20px;
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

        /* User Icon */
        .user-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 40px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2>User Profile</h2>

    <div class="profile-info">
        <label>Email:</label>
        <span><?php echo $userData['Email']; ?></span>
    </div>


    <hr>

    <div class="profile-info">
        <label>Name:</label>
        <span><?php echo $personalData['name']; ?></span>
    </div>

    <div class="profile-info">
        <label>Age:</label>
        <span><?php echo $personalData['age']; ?></span>
    </div>
    <div class="profile-info">
        <label>Sex:</label>
        <span><?php echo $personalData['sex']; ?></span>
    </div>
    <div class="profile-info">
        <label>Phone:</label>
        <span><?php echo $personalData['phone']; ?></span>
    </div>
    <div class="profile-info">
        <label>Board:</label>
        <span><?php echo $personalData['board']; ?></span>
    </div>
    <div class="profile-info">
        <label>Ambition:</label>
        <span><?php echo $personalData['ambition']; ?></span>
    </div>
    <div class="profile-info">
        <label>Address:</label>
        <span><?php echo $personalData['address']; ?></span>
    </div>

    <div class="profile-info">
        <label>School:</label>
        <span><?php echo $personalData['school']; ?></span>
    </div>



    <!-- User Icon for Editing -->
    <div class="user-icon">
    </div>
    <div class="edit-button">
        <button onclick="location.href='edit_profile.php'">Edit Profile</button>
    </div>
</div>

</body>
</html>

