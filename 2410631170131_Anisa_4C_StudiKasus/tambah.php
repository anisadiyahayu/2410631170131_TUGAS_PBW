<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>

<h2>Tambah Buku</h2>

<form action="proses_tambah.php" method="POST">
    Judul:
    <input type="text" name="Judul" required>
    <br><br>

    Penulis:
    <input type="text" name="Penulis" required>
    <br><br>

    Tahun Terbit:
    <input type="number" name="Tahun_terbit" required>
    <br><br>

    Harga:
    <input type="number" name="Harga" required>
    <br><br>

    Stock:
    <input type="number" name="Stock" required>
    <br><br>

    <button type="submit">Simpan</button>
    <a href="index.php">Kembali</a>
</form>

</body>
</html>