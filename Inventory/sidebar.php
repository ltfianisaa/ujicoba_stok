<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="sb.css">
</head>
<body>

    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <a href="inventory.php" onclick="showContent('inventory')">INVENTORY</a>
            <a href="vendor.php" onclick="showContent('vendor')">VENDOR</a>
            <a href="storage.php" onclick="showContent('storage')">STORAGE</a>
            <br>
            <p><a href="logout.php">LOGOUT</a></p>
        </ul>
    </div>

</body>
</html>
