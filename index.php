<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/style.css">
    <title>MyNotes</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to MyNotes</h1>
        <?php if (isset($_SESSION['username'])): ?>
            <p>Hello, <?= $_SESSION['username']; ?>!</p>
            <a class="button" href="/views/notes.php">View Notes</a>
        <?php else: ?>
            <a class="button" href="/views/login.php">Login</a>
            <a class="button" href="/views/register.php">Register</a>
        <?php endif; ?>
    </div>
</body>
</html>