<?php
include 'db.php'; // Include your database connection file

// Fetch all courses for dropdown
$courses_query = "SELECT id, course_name FROM courses";
$courses_result = $conn->query($courses_query);

// Handle form submissions for creating, updating, and deleting jobs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        // Create new job
        $course_id = $_POST['course_id'];
        $new_job = $_POST['job'];
        
        // Fetch existing jobs
        $careers_query = "SELECT jobs FROM careers WHERE id = ?";
        $stmt = $conn->prepare($careers_query);
        $stmt->bind_param('i', $course_id);
        $stmt->execute();
        $careers_result = $stmt->get_result();
        $jobs = [];
        
        if ($row = $careers_result->fetch_assoc()) {
            $jobs = json_decode($row['jobs'], true);
        }
        
        $jobs[] = $new_job; // Add new job
        $jobs_json = json_encode($jobs);
        
        // Update careers table or insert if not exists
        $update_query = "INSERT INTO careers (id, course_name, jobs) VALUES (?, (SELECT course_name FROM courses WHERE id = ?), ?) ON DUPLICATE KEY UPDATE jobs = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param('iiss', $course_id, $course_id, $jobs_json, $jobs_json);
        $update_stmt->execute();
    }
    
    if (isset($_POST['delete'])) {
        // Delete a job
        $course_id = $_POST['course_id'];
        $job_to_delete = $_POST['job_to_delete'];
        
        // Fetch existing jobs
        $careers_query = "SELECT jobs FROM careers WHERE id = ?";
        $stmt = $conn->prepare($careers_query);
        $stmt->bind_param('i', $course_id);
        $stmt->execute();
        $careers_result = $stmt->get_result();
        $jobs = [];
        
        if ($row = $careers_result->fetch_assoc()) {
            $jobs = json_decode($row['jobs'], true);
        }
        
        // Remove job
        $jobs = array_filter($jobs, function($job) use ($job_to_delete) {
            return $job !== $job_to_delete;
        });
        
        $jobs_json = json_encode(array_values($jobs)); // Re-index the array
        
        // Update careers table
        $update_query = "UPDATE careers SET jobs = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param('si', $jobs_json, $course_id);
        $update_stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body{
        color : white;
        background: url("images/hero-bg.jpg") center/cover repeat;
    }
    .list-group
    {
        color : black;
    }
</style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Manage Jobs</h1>
    
    <!-- Job Creation Form -->
    <form method="POST" class="mb-4">
        <div class="form-group">
            <label for="course_id">Select Course</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <?php while ($course = $courses_result->fetch_assoc()): ?>
                    <option value="<?php echo $course['id']; ?>"><?php echo htmlspecialchars($course['course_name']); ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="job">Job Title</label>
            <input type="text" name="job" id="job" class="form-control" required>
        </div>
        <button type="submit" name="create" class="btn btn-success">Add Job</button>
    </form>

    <!-- Display Existing Jobs -->
    <h2>Existing Jobs</h2>
    <?php
    $courses_result = $conn->query($courses_query); // Re-execute the courses query to fetch data again
    while ($course = $courses_result->fetch_assoc()):
        $course_id = $course['id'];
        $jobs_query = "SELECT jobs FROM careers WHERE id = ?";
        $stmt = $conn->prepare($jobs_query);
        $stmt->bind_param('i', $course_id);
        $stmt->execute();
        $jobs_result = $stmt->get_result();
        
        if ($jobs_row = $jobs_result->fetch_assoc()):
            $jobs = json_decode($jobs_row['jobs'], true);
    ?>
        <h4><?php echo htmlspecialchars($course['course_name']); ?></h4>
        <ul class="list-group mb-4">
            <?php if (is_array($jobs) && count($jobs) > 0): ?>
                <?php foreach ($jobs as $job): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($job); ?>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                            <input type="hidden" name="job_to_delete" value="<?php echo htmlspecialchars($job); ?>">
                            <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">No jobs available for this course.</li>
            <?php endif; ?>
        </ul>
    <?php endif; endwhile; ?>
</div>
</body>
</html>

<?php
$conn->close();
?>

