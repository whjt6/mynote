<?php
session_start();
include '../db.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO notes (content, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $content, $password);
    $stmt->execute();
}

$stmt = $conn->prepare("SELECT * FROM notes");
$stmt->execute();
$result = $stmt->get_result();
$notes = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/style.css">
    <title>Your Notes</title>
</head>
<body>
    <div class="container">
        <h1>Your Notes</h1>
        <form action="" method="POST">
            <textarea name="content" placeholder="Write your note here..." required></textarea>
            <input type="password" name="password" placeholder="Password (optional)">
            <button type="submit">Save Note</button>
        </form>
        <h2>Saved Notes</h2>
        <ul>
            <?php foreach ($notes as $note): ?>
                <li><?= htmlspecialchars($note['content']); ?> <strong>(Password: <?= htmlspecialchars($note['password']); ?>)</strong></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>