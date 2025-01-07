<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

include 'db.php';

// Fetch users
$users = $conn->query("SELECT * FROM users");

// Handle form submission for updating or deleting users
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action === 'update') {
        $email = $_POST['email'];
        $role = $_POST['role'];
        
        // Update user in the database
        $stmt = $conn->prepare("UPDATE users SET email = ?, role = ? WHERE id = ?");
        $stmt->bind_param("ssi", $email, $role, $id);
        $stmt->execute();
        $stmt->close();
    } elseif ($action === 'delete') {
        // Delete user from the database
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect to the same page to see changes
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("images/hero-bg.jpg") center/cover no-repeat;
            color: white;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 2rem;
            background: transparent;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #388e3c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #4caf50;
            color: white;
        }
        button {
            padding: 0.75rem;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #388e3c;
        }
        input[type="email"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage Users</h2>

        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $users->fetch_assoc()) { ?>
                    <tr>
                        <form method="POST">
                            <td>
                                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                            </td>
                            <td>
                                <select name="role">
                                    <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
                                    <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="action" value="update">Update</button>
                                <button type="submit" name="action" value="delete" style="background-color: #d32f2f;">Delete</button>
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>



