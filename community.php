<?php
// Start output buffering to capture dynamic content
ob_start();

session_start();

// Add your community page content here
$isUserLoggedIn = isset($_SESSION['user']);

// Display a login prompt if the user is not logged in
if (!$isUserLoggedIn) {
    echo "<script>
        location.href = 'please-login-first.php';
    </script>";
    exit; // Stop further execution if redirecting
}

?>
<!-- Community Page Content Here -->
<h1>Welcome to the Community Page</h1>

<h1>Ham</h1>

<?php
// Capture the output as $content
$content = ob_get_clean();

// Include the main layout, passing in the dynamic content
include 'layout.php';
?>
