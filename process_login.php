<?php
// Lakukan koneksi ke database
include_once "koneksi.php";

// Ambil nilai yang dikirimkan dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari user berdasarkan username
$query = "SELECT * FROM users WHERE username ='$username'";
$result = mysqli_query($koneksi, $query);

// Periksa apakah user ditemukan
if (mysqli_num_rows($result) > 0) {
    // User ditemukan, verifikasi password
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        // Password benar, redirect ke halaman utama atau berikan akses
        header("Location: home.php");
        exit();
    } else {
        // Password salah, berikan pesan error
        echo "Password salah.";
    }
} else {
    // User tidak ditemukan, berikan pesan error
    echo "User tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
