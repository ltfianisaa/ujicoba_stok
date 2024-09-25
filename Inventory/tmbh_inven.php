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
      <form action="proses_inven.php" method="post">
        <h1>Form Tambah Inventory</h1>
        <label class="inventory">Nama Barang</label>
        <select name="nm_brg">
            <option value=""></option>
            <?php 
            include "koneksi.php";
            $sql = "SELECT * FROM vendor";
            $hsl = mysqli_query($con, $sql);

            if($hsl -> num_rows > 0 ){
                while($data = mysqli_fetch_assoc($hsl)){
                    echo "<option value='{$data['id_vendor']}'>{$data['nm_brg']}</option>";
                }
            }
            ?>
        </select>
        <label class="inventory">Jenis Barang</label>
        <input type="text" name="jenis_brg" placeholder="Jenis Barang" required>
        <label class="inventory">Kuantitas Barang</label>
        <input type="text" name="kuantitas_stock" placeholder="Kuantitas Barang" required>
        <label class="inventory">Lokasi Gudang</label>
        <select name="lokasi_gudang">
            <option value=""></option>
            <?php 
            include "koneksi.php";
            $sql = "SELECT * FROM storage";
            $hsl = mysqli_query($con, $sql);

            if($hsl -> num_rows > 0 ){
                while($data = mysqli_fetch_assoc($hsl)){
                    echo "<option value='{$data['id_storage']}'>{$data['lokasi_gudang']}</option>";
                }
            }
            ?>
        </select>
        <label class="inven">Serial Number</label>
        <input type="number" name="serial_nmber" placeholder="Serial Number" required>
        <label class="inven">Harga</label>
        <input type="text" name="harga_brg" placeholder="harga" required>
        <button>Tambah Data</button>
      </form>
      <p><a href="inventory.php">Kembali ke Dashboard</a></p>
    </div>
</body>
</html>