<?php
include 'db.php'; // Include your database connection file

// Fetch all colleges for display
$colleges_query = "SELECT id, college_name, courses_offered FROM colleges";
$colleges_result = $conn->query($colleges_query);

// Handle form submissions for creating, updating, and deleting colleges
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        // Create new college
        $college_name = $_POST['college_name'];
        $courses_offered = json_encode(array_map('trim', explode(',', $_POST['courses_offered']))); // Split and trim courses
        
        $insert_query = "INSERT INTO colleges (college_name, courses_offered) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param('ss', $college_name, $courses_offered);
        $insert_stmt->execute();
    }
    
    if (isset($_POST['update'])) {
        // Update college
        $college_id = $_POST['college_id'];
        $college_name = $_POST['college_name'];
        $courses_offered = json_encode(array_map('trim', explode(',', $_POST['courses_offered']))); // Split and trim courses
        
        $update_query = "UPDATE colleges SET college_name = ?, courses_offered = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param('ssi', $college_name, $courses_offered, $college_id);
        $update_stmt->execute();
    }
    
    if (isset($_POST['delete'])) {
        // Delete a college
        $college_id = $_POST['college_id'];
        
        $delete_query = "DELETE FROM colleges WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bind_param('i', $college_id);
        $delete_stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body
        {
            color : white;
            background: url("images/hero-bg.jpg") center/cover repeat;
        }
        .card
        {
            color : black;
        }

        /* Previous button at bottom-left */
        .prev-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .prev-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Manage Colleges</h1>
    
    <!-- College Creation Form -->
    <form method="POST" class="mb-4">
        <div class="form-group">
            <label for="college_name">College Name</label>
            <input type="text" name="college_name" id="college_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="courses_offered">Courses Offered (comma separated)</label>
            <input type="text" name="courses_offered" id="courses_offered" class="form-control" required>
        </div>
        <button type="submit" name="create" class="btn btn-success">Add College</button>
    </form>

    <!-- Display Existing Colleges -->
    <h2>Existing Colleges</h2>
    <?php while ($college = $colleges_result->fetch_assoc()): ?>
        <div class="card mb-4">
            <div class="card-header">
                <?php echo htmlspecialchars($college['college_name']); ?>
            </div>
            <div class="card-body">
                <p><strong>Courses Offered:</strong> <?php echo htmlspecialchars(implode(', ', json_decode($college['courses_offered'], true))); ?></p>
                <button class="btn btn-info" onclick="editCollege(<?php echo $college['id']; ?>, '<?php echo htmlspecialchars($college['college_name']); ?>', '<?php echo htmlspecialchars($college['courses_offered']); ?>')">Update</button>
                <form method="POST" class="d-inline">
                    <input type="hidden" name="college_id" value="<?php echo $college['id']; ?>">
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editForm" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit College</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="college_id" id="edit_college_id">
                    <div class="form-group">
                        <label for="edit_college_name">College Name</label>
                        <input type="text" name="college_name" id="edit_college_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_courses_offered">Courses Offered (comma separated)</label>
                        <input type="text" name="courses_offered" id="edit_courses_offered" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Update College</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function editCollege(id, name, courses) {
    document.getElementById('edit_college_id').value = id;
    document.getElementById('edit_college_name').value = name;
    document.getElementById('edit_courses_offered').value = JSON.parse(courses).join(', '); // Parse and join for display
    $('#editModal').modal('show'); // Show the modal
}
</script>
</body>
</html>

