<?php
include "koneksi.php";

if (isset($_GET['id_inven'])) {
    $id_inven = mysqli_real_escape_string($con, $_GET['id_inven']);

    $sql = "SELECT * FROM inventory WHERE id_inven = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id_inven);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Data Gagal Diambil: " . mysqli_error($con));
    }

    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_inven = mysqli_real_escape_string($con, $_POST['id_inven']);
    $id_vendor = mysqli_real_escape_string($con, $_POST['id_vendor']);
    $jenis_brg = mysqli_real_escape_string($con, $_POST['jenis_brg']);
    $kuantitas_stock = mysqli_real_escape_string($con, $_POST['kuantitas_stock']);
    $id_storage = mysqli_real_escape_string($con, $_POST['id_storage']);
    $serial_nmber = mysqli_real_escape_string($con, $_POST['serial_nmber']);
    $harga_brg = mysqli_real_escape_string($con, $_POST['harga_brg']);

    $sql = "UPDATE inventory SET
            nm_brg = ?,
            jenis_brg = ?,
            kuantitas_stock = ?,
            lokasi_gudang = ?,
            serial_nmber = ?,
            harga_brg = ?
            WHERE id_inven = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssissss", $id_vendor, $jenis_brg, $kuantitas_stock, $id_storage, $serial_nmber, $harga_brg, $id_inven);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: inventory.php");
        exit();
    } else {
        die("Data Gagal Diupdate: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inventory</title>
    <link rel="stylesheet" href="form1.css">
</head>
<body>
    <h1>Update Inventory</h1>
    <form method="POST" action="">
        <input type="hidden" name="id_inven" value="<?php echo htmlspecialchars($data['id_inven']); ?>">

        <label for="nm_brg">Nama Barang:</label>
        <select name="id_vendor" required>
            <option value="<?php echo htmlspecialchars($data['nm_brg']); ?>">
                <?php
                $sql = "SELECT nm_brg FROM vendor WHERE id_vendor = ?";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "s", $data['nm_brg']);
                mysqli_stmt_execute($stmt);
                $vendor_result = mysqli_stmt_get_result($stmt);
                $vendor_data = mysqli_fetch_assoc($vendor_result);
                echo htmlspecialchars($vendor_data['nm_brg']);
                ?>
            </option>
            <?php
            $sql = "SELECT id_vendor, nm_brg FROM vendor";
            $hsl = mysqli_query($con, $sql);

            if ($hsl) {
                while ($dat = mysqli_fetch_assoc($hsl)) {
                    $sel = ($dat['id_vendor'] == $data['nm_brg']) ? 'selected' : '';
                    echo "<option value='{$dat['id_vendor']}' $sel>{$dat['nm_brg']}</option>";
                }
            }
            ?>
        </select>
        <br>

        <label for="jenis_brg">Jenis Barang:</label>
        <input type="text" id="jenis_brg" name="jenis_brg" value="<?php echo htmlspecialchars($data['jenis_brg']); ?>" required>
        <br>

        <label for="kuantitas_stock">Kuantitas Stok:</label>
        <input type="number" id="kuantitas_stock" name="kuantitas_stock" value="<?php echo htmlspecialchars($data['kuantitas_stock']); ?>" required>
        <br>

        <label for="lokasi_gudang">Lokasi Gudang:</label>
        <select name="id_storage" required>
            <option value="<?php echo htmlspecialchars($data['lokasi_gudang']); ?>">
                <?php
                // Fetch the corresponding storage location for the current id_storage
                $sql = "SELECT lokasi_gudang FROM storage WHERE id_storage = ?";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "s", $data['lokasi_gudang']);
                mysqli_stmt_execute($stmt);
                $storage_result = mysqli_stmt_get_result($stmt);
                $storage_data = mysqli_fetch_assoc($storage_result);
                echo htmlspecialchars($storage_data['lokasi_gudang']);
                ?>
            </option>
            <?php
            $sql = "SELECT id_storage, lokasi_gudang FROM storage";
            $hsl = mysqli_query($con, $sql);

            if ($hsl) {
                while ($dat = mysqli_fetch_assoc($hsl)) {
                    $sel = ($dat['id_storage'] == $data['lokasi_gudang']) ? 'selected' : '';
                    echo "<option value='{$dat['id_storage']}' $sel>{$dat['lokasi_gudang']}</option>";
                }
            }
            ?>
        </select>
        <br>

        <label for="serial_nmber">Serial Number:</label>
        <input type="text" id="serial_nmber" name="serial_nmber" value="<?php echo htmlspecialchars($data['serial_nmber']); ?>" required>
        <br>

        <label for="harga_brg">Harga:</label>
        <input type="text" id="harga_brg" name="harga_brg" value="<?php echo htmlspecialchars($data['harga_brg']); ?>" required>
        <br>

        <button type="submit">Update</button>
    </form>
    <a href="inventory.php">Kembali ke Dashboard</a>
</body>
</html>
