<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .dashboard-container { background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); width: 300px; text-align: center; }
        h1 { color: #333; }
        .logout-btn { background-color: #dc3545; color: white; padding: 10px 15px; width: 100%; border: none; border-radius: 4px; cursor: pointer; }
        .logout-btn:hover { background-color: #c82333; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>This is your dashboard.</p>
        <a href="logout.php"><button class="logout-btn">Logout</button></a>
    </div>
</body>
</html>
