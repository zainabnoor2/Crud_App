<?php
include 'db.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if (!empty($name) && !empty($description)) {
        $stmt = $pdo->prepare("INSERT INTO items (name, description) VALUES (:name, :description)");
        $stmt->execute(['name' => $name, 'description' => $description]);
    }
}

// Redirect back to the main page
header('Location: index.php');
exit;
