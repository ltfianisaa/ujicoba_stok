<?php
include "koneksi.php";

if (isset($_GET['id_vendor'])) {
    $id_vendor = mysqli_real_escape_string($con, $_GET['id_vendor']);

    $sql = "SELECT * FROM vendor WHERE id_vendor = '$id_vendor'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Data Gagal Diambil: " . mysqli_error($con));
    }

    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Data tidak ditemukan.");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $kontak = mysqli_real_escape_string($con, $_POST['kontak']);
    $nm_brg = mysqli_real_escape_string($con, $_POST['nm_brg']);
    $nmr_invoice = mysqli_real_escape_string($con, $_POST['nmr_invoice']);

    $sql = "UPDATE vendor SET
            nama = '$nama',
            kontak = '$kontak',
            nm_brg = '$nm_brg',
            nmr_invoice = '$nmr_invoice'
            WHERE id_vendor = '$id'";

    if (mysqli_query($con, $sql)) {
        header("Location: vendor.php"); // Redirect ke halaman admin setelah update
        exit();
    } else {
        die("Data Gagal Diupdate " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vendor</title>
    <link rel="stylesheet" href="form1.css">
</head>
<body>

    <h1>Update Vendor</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id_vendor']); ?>">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
        <br>
        <label for="kontak">Kontak</label>
        <input type="text" id="kontak" name="kontak" value="<?php echo htmlspecialchars($data['kontak']); ?>" required>
        <br>
        <label for="nm_brg">Nama Barang</label>
        <input type="text" id="nm_brg" name="nm_brg" value="<?php echo htmlspecialchars($data['nm_brg']); ?>" required>
        <br>
        <label for="nmr_invoice">Nomor Invoice</label>
        <input type="text" id="nmr_invoice" name="nmr_invoice" value="<?php echo htmlspecialchars($data['nmr_invoice']); ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="vendor.php">Kembali ke Dashboard</a>

</body>
</html>
