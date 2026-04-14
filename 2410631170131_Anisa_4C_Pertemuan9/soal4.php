<!DOCTYPE html>
<html>
<head>
    <title>Soal 4 - Ternary Operator</title>
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

<h3>Soal 4 - Ternary Operator</h3>
<p>Menentukan bilangan genap atau ganjil.</p>

<form method="post">
    Masukkan angka <br>
    <input type="number" name="angka" required>
    <br><br>
    <button type="submit" name="btn4">Cek</button>
</form>

<?php
if (isset($_POST['btn4'])) {
    $angka = $_POST['angka'];

    $cek = ($angka % 2 == 0) ? "Genap" : "Ganjil";

    echo "<p>Angka <b>$angka</b> termasuk bilangan <b>$cek</b></p>";
}
?>

</body>
</html>