<?php
session_start();

if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu."));
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['nama']); ?></h2>
    <p>Anda berhasil login ke dalam sistem.</p>

    <a href="logout.php" class="btn btn-danger">Logout</a>

</body>
</html>