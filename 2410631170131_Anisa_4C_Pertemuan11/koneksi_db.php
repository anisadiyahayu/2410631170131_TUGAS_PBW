<?php
$host = "localhost";
$user = "root";
$pass = ""; // sesuaikan dengan password database Anda
$db   = "pemrograman_web_contoh";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>