<?php
include "koneksi.php";

if(isset($_GET['id_vendor'])){
    $id_vendor = $_GET['id_vendor'];

    $sql = "DELETE FROM vendor WHERE id_vendor = '$id_vendor'";
    $hsl = mysqli_query($con, $sql);

    if($hsl){
        echo "<script>
        alert('Data berhasil dihapus');
        location.href = 'vendor.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menghapus data: " . mysqli_error($con) . "');
        location.href = 'vendor.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID tidak ditemukan " . mysqli_error($con) . "' );
    location.href = 'vendor.php';
    </script>";
}
?>
