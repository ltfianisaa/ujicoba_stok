<?php
include "koneksi.php";

if(isset($_GET['id_storage'])){
    $id_storage = $_GET['id_storage'];

    $sql = "DELETE FROM storage WHERE id_storage = '$id_storage'";
    $hsl = mysqli_query($con, $sql);

    if($hsl){
        echo "<script>
        alert('Data berhasil dihapus');
        location.href = 'storage.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menghapus data: " . mysqli_error($con) . "');
        location.href = 'storage.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID tidak ditemukan');
    location.href = 'storage.php';
    </script>";
}
?>
