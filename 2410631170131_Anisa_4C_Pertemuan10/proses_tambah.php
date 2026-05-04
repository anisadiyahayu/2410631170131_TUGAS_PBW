<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Tahun_terbit = $_POST['Tahun_terbit'];
    $Harga = $_POST['Harga'];
    $Stock = $_POST['Stock'];

    $stmt = $conn->prepare(
        "INSERT INTO buku
        (Judul, Penulis, Tahun_terbit, Harga, Stock)
        VALUES (?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Prepare gagal: " . $conn->error);
    }

    $stmt->bind_param(
        "ssidi",
        $Judul,
        $Penulis,
        $Tahun_terbit,
        $Harga,
        $Stock
    );

    if ($stmt->execute()) {
        header("Location: index.php?pesan=Data berhasil ditambahkan");
    } else {
        echo "Data gagal ditambahkan: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>