<?php
session_start();
include 'db.php'; // Ensure you have a proper connection to your database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? ''; // Use null coalescing operator to avoid undefined index notice
    $password = $_POST['password'] ?? '';

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
    
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        // Verify password
        if ($stmt->num_rows === 0) {
            $error = "Invalid credentials"; // No user found
        } else {
            if (password_verify($password, $hashed_password)) {
                // Store the fetched user ID and role in the session
                $_SESSION['id'] = $id; // Store user ID
                $_SESSION['role'] = $role; // Store user role
                $_SESSION['email'] = $email; // Store user email

                // Redirect based on role
                if ($role === 'admin') {
                    header('Location: dashboard.php');
                } else {
                    header('Location: user.html');
                }
                exit(); // Ensure script stops after redirect
            } else {
                $error = "Invalid credentials"; // Password did not match
            }
        }
        $stmt->close();
    } else {
        // Handle SQL statement preparation failure
        $error = "Error preparing statement: " . $conn->error;
    }
}

// Optionally, display the error message on the login page
if (isset($error)) {
    echo "<div style='color: red;'>$error</div>";
}

// Close the database connection
$conn->close();
?>


