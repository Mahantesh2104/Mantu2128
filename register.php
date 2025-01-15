<?php
// Initialize error and success messages
$error_message = "";
$success_message = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate form inputs
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        // Dummy registration process (save credentials in session)
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        $success_message = "Registration successful! You can now <a href='login.php'>login here</a>.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .register-container { background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); width: 300px; text-align: center; }
        h1 { margin-bottom: 20px; color: #333; }
        .input-group { margin-bottom: 15px; text-align: left; }
        .input-group input { width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc; }
        .register-btn { background-color: #28a745; color: white; padding: 10px 15px; width: 100%; border: none; border-radius: 4px; cursor: pointer; }
        .register-btn:hover { background-color: #218838; }
        .error { color: red; margin-bottom: 10px; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <?php if ($error_message) { echo '<p class="error">'.$error_message.'</p>'; } ?>
        <?php if ($success_message) { echo '<p class="success">'.$success_message.'</p>'; } ?>
        <form method="POST" action="">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="register-btn">Register</button>
        </form>
    </div>
</body>
</html>
