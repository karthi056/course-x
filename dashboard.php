<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url("images/hero-bg.jpg") center/cover no-repeat;
        }
        .profile-button, .logout-button {
            position: absolute;
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .profile-button {
            top: 20px;
            left: 20px; /* Place Profile button on the left */
            background-color: #00796b; /* Green color */
        }
        .logout-button {
            top: 20px;
            right: 20px; /* Logout button stays on the right */
            background-color: #d32f2f; /* Red color */
        }
        .dashboard-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 70%;
            max-width: 900px;
            margin-top: 20px;
            flex-wrap: wrap; /* Allows wrapping of buttons */
        }
        .dashboard-option {
            width: 200px;
            height: 200px;
            background-color: #00796b;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-decoration: none;
            flex-direction: column;
            transition: background-color 0.3s;
            margin: 10px; /* Adds space between buttons */
        }
        .dashboard-option:hover {
            background-color: #004d40;
        }
        .dashboard-option i {
            font-size: 48px;
            margin-bottom: 10px;
        }
        .dashboard-option span {
            font-size: 20px;
        }
        h2 {
            color: white;
            font-size: 36px; /* Increased size */
            margin-bottom: 40px; /* Increased space from buttons */
            margin-top: 0; /* Remove default margin */
        }
    </style>
</head>
<body>
    <!-- Profile Button (on the left) -->
    <button class="profile-button" onclick="window.location.href='profile.php';">Profile</button>
    
    <!-- Logout Button (on the right) -->
    <button class="logout-button" onclick="window.location.href='logout.php';">Logout</button>

    <h2>ADMIN PANEL</h2>
    
    <div class="dashboard-container">
        <a href="view_courses.php" class="dashboard-option">
            <i class="material-icons">school</i>
            <span>View Courses</span>
        </a>
        <a href="users.php" class="dashboard-option">
            <i class="material-icons">people</i>
            <span>View Users</span>
        </a>
        <a href="job_management.php" class="dashboard-option">
            <i class="material-icons">work</i>
            <span>View Career</span>
        </a>
        </a>
        <a href="college_management.php" class="dashboard-option">
            <i class="material-icons">school</i>
            <span>View Colleges</span>
        </a>
    </div>
</body>
</html>


