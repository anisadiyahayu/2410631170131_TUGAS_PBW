<!DOCTYPE html>
<html>
<head>
    <title>Soal 2 - For Loop</title>
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

<h3>Soal 2 - For Loop</h3>
<p>Menampilkan bilangan genap.</p>

<form method="post">
    Batas akhir <br>
    <input type="number" name="akhir" value="10" required>
    <br><br>
    <button type="submit" name="btn2">Tampilkan</button>
</form>

<?php
if (isset($_POST['btn2'])) {
    $akhir = $_POST['akhir'];

    echo "<p>Hasil bilangan genap dari 2 sampai $akhir :</p>";

    for ($i = 2; $i <= $akhir; $i++) {
        if ($i % 2 == 0) {
            echo $i . " ";
        }
    }
}
?>

</body>
</html>