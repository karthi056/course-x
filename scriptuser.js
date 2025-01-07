// Toggle subject list visibility
document.getElementById('subjectsButton').addEventListener('click', function() {
    window.location.href = 'subjects.html';
});

// Redirect to preferences form page
document.getElementById('preferencesButton').addEventListener('click', function() {
    window.location.href = 'preference.html';
});

// Redirect to marks form page
document.getElementById('marksButton').addEventListener('click', function() {
    window.location.href = 'marks.html';
});

// Placeholder for profile and logout buttons
document.getElementById('profileButton').addEventListener('click', function() {
    window.location.href = 'user_dashboard.php';
});

document.getElementById('logoutButton').addEventListener('click', function() {
    alert('Logging out...');
    window.location.href = 'index.html';
    // Redirect to logout logic
});
