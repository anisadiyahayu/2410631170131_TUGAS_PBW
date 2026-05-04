<?php
session_start();

if (!isset($_SESSION['login_Un51k4']) || $_SESSION['login_Un51k4'] !== true) {
    header("Location: login.php?message=" . urlencode("Silakan login terlebih dahulu."));
    exit;
}

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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .top-bar b {
            color: #007bff;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-tambah {
            display: inline-block;
            margin-bottom: 10px;
            background: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
        }

        .btn-tambah:hover {
            background: #0056b3;
            text-decoration: none;
        }

        .btn-logout {
            background: #dc3545;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
        }

        .btn-logout:hover {
            background: #c82333;
            text-decoration: none;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
        }

        th {
            background-color: #3e9bff;
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .pesan {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-weight: bold;
        }

        .aksi-edit {
            color: #007bff;
        }

        .aksi-hapus {
            color: #dc3545;
        }
    </style>
</head>
<body>

<h2>Data Buku</h2>

<div class="top-bar">
    <div>
        Selamat datang, 
        <b><?php echo htmlspecialchars($_SESSION['nama']); ?></b>
    </div>

    <div>
        <a href="logout.php" class="btn-logout" onclick="return confirm('Yakin ingin logout?')">
            Logout
        </a>
    </div>
</div>

<?php
if (isset($_GET['pesan'])) {
    echo "<div class='pesan'>" . htmlspecialchars($_GET['pesan']) . "</div>";
}
?>

<a href="tambah.php" class="btn-tambah">Tambah Buku</a>

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
            <a class="aksi-edit" href="edit.php?id=<?php echo urlencode($row['ID']); ?>">Edit</a>
            |
            <a class="aksi-hapus" href="hapus.php?id=<?php echo urlencode($row['ID']); ?>" onclick="return confirm('Yakin hapus data?')">
                Hapus
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>

<?php
$conn->close();
?>