<?php 

$con = mysqli_connect("localhost","root","","db_inven");

if(!$con){
    die("koneksi gagal" . mysqli_connect_errno() . mysqli_connect_error());
}

if($_POST){
    $nm_gudang = $_POST['nm_gudang'];
    $lokasi_gudang = $_POST['lokasi_gudang'];

    if(empty($nm_gudang) || empty($lokasi_gudang)){
        echo "<script>;
        alert('Gagal menambahkan data!');
        location='tmbh_storage.php';
        </script>";
    }else{

        $sql = "INSERT INTO storage (nm_gudang, lokasi_gudang)
        VALUES ('$nm_gudang', '$lokasi_gudang')";
        $hsl = mysqli_query($con, $sql);

        if($hsl){
            echo "<script>;
            alert('Berhasil menambahkan data!');
            location='storage.php';
            </script>";
        }
    }
}
?>