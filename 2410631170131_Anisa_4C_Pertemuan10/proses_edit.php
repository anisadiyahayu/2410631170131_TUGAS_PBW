<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama_menu = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];

    $stmt = $conn->prepare(
        "UPDATE menu 
        SET nama_menu=?, kategori=?, harga=?, stok=?, deskripsi=?, tanggal_ditambahkan=? 
        WHERE id=?"
    );

    $stmt->bind_param(
        "ssdissi",
        $nama_menu,
        $kategori,
        $harga,
        $stok,
        $deskripsi,
        $tanggal_ditambahkan,
        $id
    );

    if ($stmt->execute()) {
        header("Location: index.php?status=edit_sukses");
    } else {
        header("Location: index.php?status=gagal");
    }

    $stmt->close();
}

$conn->close();
?>