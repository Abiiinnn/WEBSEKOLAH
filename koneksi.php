<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_sklh");
// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
