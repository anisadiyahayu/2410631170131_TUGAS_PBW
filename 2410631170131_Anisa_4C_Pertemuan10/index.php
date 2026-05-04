<?php
session_start();

if (!isset($_SESSION['login_Un51k4']) || $_SESSION['login_Un51k4'] !== true) {
    header("Location: login.php?message=" . urlencode("Silakan login terlebih dahulu."));
    exit;
}

include 'koneksi.php';

$cari = "";

if (isset($_GET['cari']) && $_GET['cari'] !== "") {
    $cari = $_GET['cari'];

    $stmt = $conn->prepare("SELECT * FROM menu WHERE Nama_Menu LIKE ? OR Kategori LIKE ?");

    if (!$stmt) {
        die("Prepare gagal: " . $conn->error);
    }

    $keyword = "%" . $cari . "%";
    $stmt->bind_param("ss", $keyword, $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM menu";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query gagal: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Menu Kantin</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2 class="text-center mb-4">Data Menu Makanan Kantin</h2>

    <!-- Bagian login dan logout -->
    <div class="card shadow-sm mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                Selamat datang,
                <b><?php echo htmlspecialchars($_SESSION['nama']); ?></b>
            </div>

            <a href="logout.php"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Yakin ingin logout?')">
                Logout
            </a>
        </div>
    </div>

    <!-- Alert -->
    <?php if (isset($_GET['status'])) { ?>
        <div class="alert alert-success">
            <?php
            if ($_GET['status'] == 'tambah_sukses') {
                echo "Data menu berhasil ditambahkan!";
            } elseif ($_GET['status'] == 'edit_sukses') {
                echo "Data menu berhasil diubah!";
            } elseif ($_GET['status'] == 'hapus_sukses') {
                echo "Data menu berhasil dihapus!";
            } else {
                echo "Terjadi kesalahan!";
            }
            ?>
        </div>
    <?php } ?>

    <!-- Tombol tambah -->
    <div class="mb-3">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Menu</a>
    </div>

    <!-- Form cari -->
    <form method="GET" action="index.php" class="row g-2 mb-3">
        <div class="col-md-6">
            <input type="text"
                   name="cari"
                   class="form-control"
                   placeholder="Cari nama menu atau kategori..."
                   value="<?php echo htmlspecialchars($cari); ?>">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Cari</button>
        </div>

        <div class="col-md-2">
            <a href="index.php" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>

    <!-- Tabel -->
    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $no = 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>

                        <td><?php echo htmlspecialchars($row['Nama_Menu']); ?></td>

                        <td><?php echo htmlspecialchars($row['Kategori']); ?></td>

                        <td>
                            Rp <?php echo number_format($row['Harga'], 0, ',', '.'); ?>
                        </td>

                        <td class="text-center">
                            <?php echo htmlspecialchars($row['Stock']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['Deskripsi']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['Tanggal_ditambahkan']); ?>
                        </td>

                        <td class="text-center">
                            <a href="edit.php?id=<?php echo urlencode($row['ID']); ?>"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="hapus.php?id=<?php echo urlencode($row['ID']); ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="8" class="text-center">
                            Data tidak ditemukan.
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>

<?php
if (isset($stmt)) {
    $stmt->close();
}

$conn->close();
?>