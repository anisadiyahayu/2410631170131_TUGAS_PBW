<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_menu = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];

    $stmt = $conn->prepare(
        "INSERT INTO menu 
        (nama_menu, kategori, harga, stock, deskripsi, tanggal_ditambahkan) 
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssdiss",
        $nama_menu,
        $kategori,
        $harga,
        $stock,
        $deskripsi,
        $tanggal_ditambahkan
    );

    if ($stmt->execute()) {
        header("Location: index.php?status=tambah_sukses");
    } else {
        header("Location: index.php?status=gagal");
    }

    $stmt->close();
}

$conn->close();
?>