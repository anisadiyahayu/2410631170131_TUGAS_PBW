<!DOCTYPE html>
<html>
<head>
    <title>Soal 1 - Switch Case</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
        }

        .menu {
            margin: 20px 0;
        }

        .menu a {
            text-decoration: none;
            background-color: #3366cc;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            margin: 5px;
            display: inline-block;
        }

        .menu a:hover {
            background-color: #254a99;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="menu">
    <a href="index.php">Home</a>
    <a href="soal1.php">Soal 1</a>
    <a href="soal2.php">Soal 2</a>
    <a href="soal3.php">Soal 3</a>
    <a href="soal4.php">Soal 4</a>
</div>

<h3>Soal 1 - Switch Case</h3>
<p>Menentukan jenis kendaraan dari jumlah roda.</p>

<form method="post">
    Jumlah roda <br>
    <input type="number" name="roda" required>
    <br><br>
    <button type="submit" name="btn1">Cek</button>
</form>

<?php
if (isset($_POST['btn1'])) {
    $roda = $_POST['roda'];

    switch ($roda) {
        case 2:
            $hasil = "Motor, Sepeda";
            break;
        case 3:
            $hasil = "Bajaj, Becak";
            break;
        case 4:
            $hasil = "Mobil, Truk";
            break;
        default:
            $hasil = "Tidak diketahui";
            break;
    }

    echo "<p>Jumlah roda: <b>$roda</b></p>";
    echo "<p>Jenis kendaraan: <b>$hasil</b></p>";
}
?>

</body>
</html>