<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=crud_app_db', 'root', '');
    echo "PDO connection works!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
