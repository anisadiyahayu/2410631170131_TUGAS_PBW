<?php
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM menu WHERE id=?");
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
    <title>Edit Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Menu Makanan</h2>

    <form method="POST" action="proses_edit.php">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <label>Nama Menu</label>
        <input type="text" name="nama_menu" value="<?php echo htmlspecialchars($data['nama_menu']); ?>" required>

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="Makanan" <?php if ($data['kategori'] == 'Makanan') echo 'selected'; ?>>Makanan</option>
            <option value="Minuman" <?php if ($data['kategori'] == 'Minuman') echo 'selected'; ?>>Minuman</option>
            <option value="Snack" <?php if ($data['kategori'] == 'Snack') echo 'selected'; ?>>Snack</option>
        </select>

        <label>Harga</label>
        <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required>

        <label>Stok</label>
        <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi"><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>

        <label>Tanggal Ditambahkan</label>
        <input type="date" name="tanggal_ditambahkan" value="<?php echo $data['tanggal_ditambahkan']; ?>" required>

        <button type="submit" name="submit" class="btn">Update</button>
        <a href="index.php" class="btn btn-hapus">Kembali</a>
    </form>
</div>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>