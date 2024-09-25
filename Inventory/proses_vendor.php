<?php 

$con = mysqli_connect("localhost","root","","db_inven");

if(!$con){
    die("koneksi gagal" . mysqli_connect_errno() . mysqli_connect_error());
}

if($_POST){
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $nm_brg = $_POST['nm_brg'];
    $nmr_invoice = $_POST['nmr_invoice'];

    if(empty($nama) || empty($kontak) || empty($nm_brg) || empty($nmr_invoice)){
        echo "<script>;
        alert('Gagal menambahkan data!');
        location='tmbh_vendor.php';
        </script>";
    }else{

        $sql = "INSERT INTO vendor (nama, kontak, nm_brg, nmr_invoice)
        VALUES ('$nama', '$kontak', '$nm_brg', '$nmr_invoice')";
        $hsl = mysqli_query($con, $sql);

        if($hsl){
            echo "<script>;
            alert('Berhasil menambahkan data');
            location='vendor.php';
            </script>";
        }
    }
}
?>