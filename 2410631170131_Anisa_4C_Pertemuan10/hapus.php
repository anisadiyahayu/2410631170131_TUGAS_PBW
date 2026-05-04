<?php
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare(
        "DELETE FROM buku WHERE ID=?"
    );

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?pesan=Data berhasil dihapus");
    } else {
        header("Location: index.php?pesan=Data gagal dihapus");
    }

    $stmt->close();
} else {
    echo "ID tidak valid!";
}

$conn->close();
?>