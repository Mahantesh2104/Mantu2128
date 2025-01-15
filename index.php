<?php
session_start();

// Dummy credentials for simplicity
$valid_username = "admin";
$valid_password = "password123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-container { background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); width: 300px; text-align: center; }
        h1 { margin-bottom: 20px; color: #333; }
        .input-group { margin-bottom: 15px; text-align: left; }
        .input-group input { width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc; }
        .login-btn { background-color: #28a745; color: white; padding: 10px 15px; width: 100%; border: none; border-radius: 4px; cursor: pointer; }
        .login-btn:hover { background-color: #218838; }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (isset($error_message)) { echo '<p class="error">'.$error_message.'</p>'; } ?>
        <form method="POST" action="">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
