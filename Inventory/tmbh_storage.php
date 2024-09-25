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
        <form action="proses_storage.php" method="post">
            <h1>Tambah </h1>
            <label class="storage">Nama Gudang</label>
            <input type="text" name="nm_gudang" placeholder="Nama Gudang" required>
            <label class="storage">Lokasi Gudang</label>
            <input type="text" name="lokasi_gudang" placeholder="Lokasi Gudang" required>
            <button>Tambah Data</button>
        </form>
        <p><a href="storage.php">Kembali ke Dashboard</a></p>
    </div>
</body>
</html>