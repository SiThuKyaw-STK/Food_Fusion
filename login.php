<?php
session_start(); // Start the session
include 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare to fetch user by email
    $stmt = $conn->prepare("SELECT password, failed_attempts, lockout_until FROM user WHERE email = ?");
    $stmt->bind_param("s", $email); // Bind parameters
    $stmt->execute();
    $result = $stmt->get_result(); // Get the result set from the executed statement
    $user = $result->fetch_assoc(); // Fetch as an associative array

    if ($user) { // Check if the fetch was successful
        // Check if the user is locked out
        if ($user['lockout_until'] && strtotime($user['lockout_until']) > time()) {
            // User is still locked out
            echo json_encode(['success' => false, 'message' => 'Account locked. Please try again later.']);
            exit;
        }

        // Validate password
        if (password_verify($password, $user['password'])) {
            // Reset failed attempts and lockout timestamp on successful login
            $stmt = $conn->prepare("UPDATE user SET failed_attempts = 0, lockout_until = NULL WHERE email = ?");
            $stmt->bind_param("s", $email); // Bind parameters
            $stmt->execute();
            $_SESSION['user'] = $email; // Set session variable for logged-in user
            echo json_encode(['success' => true]);
            exit;
        } else {
            // Increment failed attempts
            $failedAttempts = $user['failed_attempts'] + 1;

            // Determine if lockout is necessary
            if ($failedAttempts >= 3) {
                $lockoutTime = 15 * 60; // Lockout for 15 minutes
                $lockoutUntil = date('Y-m-d H:i:s', time() + $lockoutTime);
                
                // Update failed attempts and lockout timestamp
                $stmt = $conn->prepare("UPDATE user SET failed_attempts = ?, lockout_until = ? WHERE email = ?");
                $stmt->bind_param("iss", $failedAttempts, $lockoutUntil, $email); // Bind parameters
                $stmt->execute();
            } else {
                // Update only failed attempts
                $stmt = $conn->prepare("UPDATE user SET failed_attempts = ? WHERE email = ?");
                $stmt->bind_param("is", $failedAttempts, $email); // Bind parameters
                $stmt->execute();
            }

            echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
        exit;
    }
}
?>
