<?php
include 'koneksi.php';

$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>

<h2>Data Buku</h2>

<?php
if (isset($_GET['pesan'])) {
    echo "<p><b>" . htmlspecialchars($_GET['pesan']) . "</b></p>";
}
?>

<a href="tambah.php">Tambah Buku</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun Terbit</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['ID']); ?></td>
        <td><?php echo htmlspecialchars($row['Judul']); ?></td>
        <td><?php echo htmlspecialchars($row['Penulis']); ?></td>
        <td><?php echo htmlspecialchars($row['Tahun_terbit']); ?></td>
        <td><?php echo number_format($row['Harga'], 2); ?></td>
        <td><?php echo htmlspecialchars($row['Stock']); ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['ID']; ?>">Edit</a> |
            <a href="hapus.php?id=<?php echo $row['ID']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>

<?php
$conn->close();
?>