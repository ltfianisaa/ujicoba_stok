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
$sql = "SELECT * FROM vendor
WHERE vendor.nama LIKE '%$search%'
ORDER BY vendor.id_vendor";


$hsl = mysqli_query($con, $sql);



if(!$hsl){

    die ("Data Gagal Diambil: " . mysqli_error($con));

}
?>

     <div id="vendor" class="table-selection">
            <h2>VENDOR</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama Vendor</th>
                    <th>Kontak Vendor</th>
                    <th>Nama Barang</th>
                    <th>aksi</th>
                </tr>
                <?php 
                
                if($hsl -> num_rows > 0){
                    while($data = mysqli_fetch_assoc($hsl)){

                        echo "<tr>";
                        echo "<td>{$data['id_vendor']}</td>";
                        echo "<td>{$data['nama']}</td>";
                        echo "<td>{$data['kontak']}</td>";
                        echo "<td>{$data['nm_brg']}</td>";
                        echo "<td><a href='hapus_vendor.php?id_vendor={$data['id_vendor']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><button>Hapus</button></a>
                              <a href='edit_vendor.php?id_vendor={$data['id_vendor']}'><button>Edit</button></a></td>";
                        echo "</tr>";
                    }
                }
                
                ?>
            </table><br>
            <a href = "tmbh_vendor.php">
                <button>Tambah Data</button>
            </a>
        
           
     </div>
   </div>
</body>
</html>
   
   