<?php
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare(
        "SELECT * FROM buku WHERE ID=?"
    );

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak valid!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>

<h2>Edit Buku</h2>

<form action="proses_edit.php" method="POST">
    <input type="hidden" name="ID" value="<?php echo htmlspecialchars($data['ID']); ?>">

    Judul:
    <input type="text" name="Judul" value="<?php echo htmlspecialchars($data['Judul']); ?>" required>
    <br><br>

    Penulis:
    <input type="text" name="Penulis" value="<?php echo htmlspecialchars($data['Penulis']); ?>" required>
    <br><br>

    Tahun Terbit:
    <input type="number" name="Tahun_terbit" value="<?php echo htmlspecialchars($data['Tahun_terbit']); ?>" required>
    <br><br>

    Harga:
    <input type="number" name="Harga" value="<?php echo htmlspecialchars($data['Harga']); ?>" required>
    <br><br>

    Stock:
    <input type="number" name="Stock" value="<?php echo htmlspecialchars($data['Stock']); ?>" required>
    <br><br>

    <button type="submit" name="submit">Update</button>
    <a href="index.php">Kembali</a>
</form>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>