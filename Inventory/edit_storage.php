<?php
include "koneksi.php";

if (isset($_GET['id_storage'])) {
    $id_storage = mysqli_real_escape_string($con, $_GET['id_storage']);

    $sql = "SELECT * FROM storage WHERE id_storage = '$id_storage'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Data Gagal Diambil: " . mysqli_error($con));
    }

    $data = mysqli_fetch_assoc($result);
} else {
    die("ID tidak ditemukan di URL.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nm_gudang = mysqli_real_escape_string($con, $_POST['nm_gudang']);
    $lokasi_gudang = mysqli_real_escape_string($con, $_POST['lokasi_gudang']);
    
    $sql = "UPDATE storage SET
            nm_gudang = '$nm_gudang',
            lokasi_gudang = '$lokasi_gudang'
            WHERE id_storage = '$id'";

    if (mysqli_query($con, $sql)) {
        header("Location: storage.php");
        exit();
    } else {
        die("Data Gagal Diupdate: " . mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Gudang</title>
    <link rel="stylesheet" href="form1.css">
</head>
<body>
    <h1>Update Storage</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id_storage']); ?>">
        <label for="nm_gudang">Nama Gudang:</label>
        <input type="text" id="nm_gudang" name="nm_gudang" value="<?php echo htmlspecialchars($data['nm_gudang']); ?>" required>
        <br>
        <label for="lokasi_gudang">Lokasi Gudang:</label>
        <input type="text" id="lokasi_gudang" name="lokasi_gudang" value="<?php echo htmlspecialchars($data['lokasi_gudang']); ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="storage.php">Kembali ke Dashboard</a>
</body>
</html>
