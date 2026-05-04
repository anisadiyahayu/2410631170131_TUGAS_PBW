<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $ID = $_POST['ID'];
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Tahun_terbit = $_POST['Tahun_terbit'];
    $Harga = $_POST['Harga'];
    $Stock = $_POST['Stock'];

    $stmt = $conn->prepare(
        "UPDATE buku
        SET Judul=?, Penulis=?, Tahun_terbit=?, Harga=?, Stock=?
        WHERE ID=?"
    );

    $stmt->bind_param(
        "ssidii",
        $Judul,
        $Penulis,
        $Tahun_terbit,
        $Harga,
        $Stock,
        $ID
    );

    if ($stmt->execute()) {
        header("Location: index.php?pesan=Data berhasil diedit");
    } else {
        header("Location: index.php?pesan=Data gagal diedit");
    }

    $stmt->close();
}

$conn->close();
?>