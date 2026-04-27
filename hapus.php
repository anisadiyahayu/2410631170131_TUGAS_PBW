<?php
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM menu WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?status=hapus_sukses");
    } else {
        header("Location: index.php?status=gagal");
    }

    $stmt->close();
} else {
    echo "ID tidak valid!";
}

$conn->close();
?>