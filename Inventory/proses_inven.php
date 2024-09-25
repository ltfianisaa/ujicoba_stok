<?php 
if($_POST){
    $nm_brg = $_POST['nm_brg'];
    $jenis_brg = $_POST['jenis_brg'];
    $kuantitas_stock = $_POST['kuantitas_stock'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $serial_nmber = $_POST['serial_nmber'];
    $harga_brg = $_POST['harga_brg'];

    if(empty($nm_brg) || empty($jenis_brg) || empty($kuantitas_stock)|| empty($lokasi_gudang) || empty($serial_nmber) || empty($harga_brg)){
        echo "<script>
        alert('Gagal menambahkan data!');
        location= 'tmbh_inven.php';
        </script>";
    } else {
        include "koneksi.php";

        $sql = "INSERT INTO inventory (nm_brg, jenis_brg, kuantitas_stock, lokasi_gudang, serial_nmber, harga_brg)
        VALUES ('$nm_brg', '$jenis_brg', '$kuantitas_stock', '$lokasi_gudang', '$serial_nmber', '$harga_brg')";
        $hsl = mysqli_query($con, $sql);
        if(!$hsl){
            die("gagal" . mysqli_error($con));
        }

        if($hsl){
            echo "<script>
            alert('Berhasil menambahkan data!');
            location= 'inventory.php';
            </script>";
        } else {
            echo "<script>
            alert('Gagal menyimpan data!');
            location.href = 'tmbh_inven.php';
            </script>";
        }
    }
}
?>
