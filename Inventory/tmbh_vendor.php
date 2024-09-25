<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form1.css">
</head>
<body>
    <div class="login_container">
        <form action="proses_vendor.php" method="post">
            <h1>Tambah Data</h1>
            <label class="vendor">Nama Vendor</label>
            <input type="text" name="nama" placeholder="Nama Vendor" required>
            <label class="vendor">Kontak Vendor</label>
            <input type="text" name="kontak" placeholder="Kontak Vendor" required>
            <label class="vendor">Nama Barang</label>
            <input type="text" name="nm_brg" placeholder="Nama Barang" required>
            <label class="vendor">Nomor Invoice</label>
            <input type="text" name="nmr_invoice" placeholder="Nomor Invoice" required>
            <button>Tambah Data</button>
        </form> 
        <p><a href="vendor.php">Kembali ke Dashboard</a></p>
    </div>
</body>
</html>