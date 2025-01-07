<?php
session_start(); // Start the session

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in and email is set in session
if (!isset($_SESSION['Email'])) {
    echo "Error: Please logout and login again !."; // Ensure user is logged in
    exit;
}

// Get user's email from the session
$Email = $_SESSION['Email'];

include 'db.php'; // Include your database connection

// Check if feedback data is received via POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = isset($_POST['feedback']) ? trim($_POST['feedback']) : ''; // Safely get feedback data

    // Check if feedback is not empty
    if (!empty($feedback)) {
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO user_feedback (Email, feedback) VALUES (?, ?)");

        if ($stmt) {
            // Bind the parameters (bind_param requires the exact types)
            $stmt->bind_param("ss", $Email, $feedback);

            // Execute the query
            if ($stmt->execute()) {
                echo "Feedback submitted successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Please provide valid feedback."; // Check if feedback is empty
    }
} else {
    echo "Invalid request method."; // Check if request method is POST
}

// Close the database connection
$conn->close();
?>



