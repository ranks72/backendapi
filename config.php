<?php
// Membuat variabel, ubah sesuai dengan nama host dan database pada hosting 
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ideamart";
 
//Menggunakan objek mysqli untuk membuat koneksi dan menyimpan nya dalam variabel $mysqli 
$mysqli = mysqli_connect($host, $user, $pass, $db);

if (!$mysqli) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>