<?php
$conn = new mysqli('localhost', 'root', '', 'Sistem_menu_kantin');

if ($conn->connect_error) {
    die("Gagal koneksi: " . $conn->connect_error);
}
?>