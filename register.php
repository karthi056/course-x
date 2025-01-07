<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course_x";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];
    // Insert user details into users table
    $stmt = $conn->prepare("INSERT INTO users (email, password,role) VALUES (?, ?,?)");
    $stmt->bind_param("sss", $email, $password,$role);

    if ($stmt->execute()) {
        // Store the new user's ID in the session
        $_SESSION['id'] = $conn->insert_id;

        // Redirect to the personal details form after registration
        header("Location: personal_details.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>



