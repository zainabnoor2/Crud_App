<?php
include 'db.php';

// Fetch all items
$stmt = $pdo->query("SELECT * FROM items ORDER BY id DESC");
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Items List</h1>

        <!-- Add Item Form -->
        <form action="add.php" method="POST" class="add-form">
            <input type="text" name="name" placeholder="Item Name" required>
            <textarea name="description" placeholder="Item Description" required></textarea>
            <button type="submit">Add Item</button>
        </form>

        <!-- Items List -->
        <?php if ($items): ?>
            <?php foreach ($items as $item): ?>
            <div class="item">
                <div class="item-info">
                    <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                    <p><?php echo htmlspecialchars($item['description']); ?></p>
                </div>
                <div class="item-actions">
                    <a href="edit.php?id=<?php echo $item['id']; ?>" class="btn edit">Edit</a>
                    <a href="delete.php?id=<?php echo $item['id']; ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No items found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
