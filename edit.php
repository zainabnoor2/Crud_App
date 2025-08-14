<?php
include 'db.php';

// Get the item ID from URL
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = intval($_GET['id']);

// Fetch current item
$stmt = $pdo->prepare("SELECT * FROM items WHERE id = :id");
$stmt->execute(['id' => $id]);
$item = $stmt->fetch();

if (!$item) {
    echo "Item not found!";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if (!empty($name) && !empty($description)) {
        $stmt = $pdo->prepare("UPDATE items SET name = :name, description = :description WHERE id = :id");
        $stmt->execute(['name' => $name, 'description' => $description, 'id' => $id]);
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Item</h1>

        <form action="" method="POST" class="add-form">
            <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
            <textarea name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
            <div class="form-buttons">
                <button type="submit" class="btn edit">Save Changes</button>
                <a href="index.php" class="btn cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
