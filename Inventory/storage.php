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
$sql = "SELECT * FROM storage
WHERE storage.nm_gudang LIKE '%$search%'
ORDER BY storage.id_storage";


$hsl = mysqli_query($con, $sql);



if(!$hsl){

    die ("Data Gagal Diambil: " . mysqli_error($con));

}
?>
     <div id="vendor" class="table-selection">
            <h2>STORAGE</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama Gudang</th>
                    <th>Lokasi Gudang</th>
                    <th>Aksi</th>
                </tr>
                <?php
                if($hsl -> num_rows > 0){
                    while($data = mysqli_fetch_assoc($hsl)){
                        echo "<tr>";
                        echo "<td>{$data['id_storage']}</td>";
                        echo "<td>{$data['nm_gudang']}</td>";
                        echo "<td>{$data['lokasi_gudang']}</td>";
                        echo "<td><a href='hapus_storage.php?id_storage={$data['id_storage']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><button>Hapus</button></a>
                                <a href='edit_storage.php?id_storage={$data['id_storage']}'><button>Edit</button></a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table><br>
            <a href = "tmbh_storage.php">
                <button>Tambah Data</button>
            </a>
            
           
     </div>
   </div>
</body>
</html>