<?php
include "koneksi.php";

if(isset($_GET['id_inven'])){
    $id_inven = $_GET['id_inven'];

    $sql = "DELETE FROM inventory WHERE id_inven = '$id_inven'";
    $hsl = mysqli_query($con, $sql);

    if($hsl){
        echo "<script>
        alert('Data berhasil dihapus!');
        location.href = 'inventory.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menghapus data " . mysqli_error($con) . "');
        location.href = 'inventory.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID tidak ditemukan');
    location.href = 'inventory.php';
    </script>";
}
?>
