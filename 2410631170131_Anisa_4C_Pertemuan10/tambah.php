<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <style>
body {
    font-family: Arial;
    background-color: #f4f4f4;
    padding: 20px;
}

h2 {
    text-align: center;
}

form {
    background: white;
    padding: 20px;
    width: 300px;
    margin: auto;
    border-radius: 5px;
}

input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
}

button {
    margin-top: 10px;
    padding: 10px;
    width: 100%;
    background-color: #007bff;
    color: white;
    border: none;
}

button:hover {
    background-color: #0056b3;
}
</style>
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