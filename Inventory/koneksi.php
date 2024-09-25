<?php

$con = mysqli_connect("localhost","root","","db_inven");

if(!$con){
    die("koneksi gagal" . mysqli_connect_errno() . mysqli_connect_error());
}
?>