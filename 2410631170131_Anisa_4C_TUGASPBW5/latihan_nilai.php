<!DOCTYPE html>
<html>
<head>
    <title>Latihan Nilai</title>
</head>
<body>

<h2>Form Input Nilai Mahasiswa</h2>

<form method="post">
    Nama: <input type="text" name="nama"><br><br>
    Nilai: <input type="number" name="nilai"><br><br>
    <input type="submit" value="Proses">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];
    $predikat = "";
    $status = "";

    // Predikat nilai
    if ($nilai >= 85 && $nilai <= 100) {
        $predikat = "A";
    } elseif ($nilai >= 75) {
        $predikat = "B";
    } elseif ($nilai >= 65) {
        $predikat = "C";
    } elseif ($nilai >= 50) {
        $predikat = "D";
    } elseif ($nilai >= 0) {
        $predikat = "E";
    } else {
        $predikat = "Tidak valid";
    }

    // Status kelulusan (misal lulus >= 65)
    if ($nilai >= 65) {
        $status = "Lulus";
    } else {
        $status = "Tidak Lulus";
    }

    // Output
    echo "<h3>Hasil:</h3>";
    echo "Nama: $nama <br>";
    echo "Nilai: $nilai <br>";
    echo "Predikat: $predikat <br>";
    echo "Status: $status";
}
?>

</body>
</html>