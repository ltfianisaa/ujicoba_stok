<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="all.css">
</head>
<body>
    <?php include "sidebar.php"; ?>
    <div class="content">
        
        <div class="search-container">
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Cari barang..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit">Cari</button>
                </form>
        </div>
            <?php


$search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
$sql = "SELECT inventory.id_inven AS id_inven, inventory.nm_brg, inventory.jenis_brg, inventory.kuantitas_stock, inventory.lokasi_gudang, inventory.serial_nmber, inventory.harga_brg,
storage.id_storage AS id_storage, storage.nm_gudang, storage.lokasi_gudang,
vendor.id_vendor AS id_vendor, vendor.nama, vendor.kontak, vendor.nm_brg AS nm_brg, vendor.nmr_invoice
FROM inventory
INNER JOIN storage ON inventory.lokasi_gudang = storage.id_storage
INNER JOIN vendor ON inventory.nm_brg = vendor.id_vendor
WHERE vendor.nm_brg LIKE '%$search%'
ORDER BY inventory.id_inven";

$hsl = mysqli_query($con, $sql);



if(!$hsl){

    die ("Data Gagal Diambil: " . mysqli_error($con));

}





$showAlert = false;

if($hsl->num_rows > 0) {

    while($data = mysqli_fetch_assoc($hsl)){

        if($data['kuantitas_stock'] == 0) {

            $showAlert = true;

            break;

        }

    }


    mysqli_data_seek($hsl, 0);

}

?>



<?php if ($showAlert): ?>
    <br>
    <div class="alert">Stok anda habis, harap perbarui jika kuantitas stok 0.</div>

<?php endif; ?>


     <div id="vendor" class="table-selection">
            <h2>INVENTORY</h2>
            <table>
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Kuantitas Barang</th>
        <th>Lokasi Gudang</th>
        <th>Serial Number</th>
        <th>Harga</th>
        <th>Aksi</th> 
    </tr>
    <?php 
  

    if($hsl -> num_rows > 0){
        while($data = mysqli_fetch_assoc($hsl)){
            $alertClass = $data['kuantitas_stock'] == 0 ? 'alert' : '';
            echo "<tr>";
            echo "<td>{$data['id_inven']}</td>";
            echo "<td>{$data['nm_brg']}</td>";
            echo "<td>{$data['jenis_brg']}</td>";
            echo "<td>{$data['kuantitas_stock']}</td>";
            echo "<td>{$data['lokasi_gudang']}</td>";
            echo "<td>{$data['serial_nmber']}</td>";
            echo "<td>{$data['harga_brg']}</td>";
            echo "<td><a href='hapus_inven.php?id_inven={$data['id_inven']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><button>Hapus</button></a> &nbsp
                  <a href='edit_inven.php?id_inven={$data['id_inven']}'><button>Edit</button></a></td>";
            echo "</tr>";
        }
    }
    ?>
</table>
<br>
            <a href = "tmbh_inven.php">
                <button>Tambah Data</button>
            </a>
           
           
     </div>
   </div>
</body>
</html>