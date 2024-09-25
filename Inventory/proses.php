<?php
include "koneksi.php";
?>

<?php
$username = $_POST['username'];
$password = $_POST['password'];

$query= "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result= mysqli_query($con,$query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
  
    if ($user['level'] == 'admin') {

      header("Location: vendor.php");
    } elseif ($user['level'] == 'user') {
      
      header("Location: user.php");
    }
  } else {

    echo "Username atau password salah!";
  }
  
  mysqli_close($con);
  ?>





