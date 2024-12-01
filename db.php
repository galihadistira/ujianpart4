<?php
$servername = "localhost";  // Nama server
$username = "root";         // Username MySQL
$password = "";             // Password MySQL (kosong untuk localhost)
$dbname = "ujianpart4";   // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
