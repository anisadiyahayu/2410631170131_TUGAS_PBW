<!DOCTYPE html>
<html>
<head>
    <title>Soal 3 - Foreach</title>
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

        input {
            margin-bottom: 10px;
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

<h3>Soal 3 - Foreach</h3>
<p>Input 5 nama hewan.</p>

<form method="post">
    Hewan 1 <br>
    <input type="text" name="h1" required><br>

    Hewan 2 <br>
    <input type="text" name="h2" required><br>

    Hewan 3 <br>
    <input type="text" name="h3" required><br>

    Hewan 4 <br>
    <input type="text" name="h4" required><br>

    Hewan 5 <br>
    <input type="text" name="h5" required><br>

    <button type="submit" name="btn3">Tampilkan</button>
</form>

<?php
if (isset($_POST['btn3'])) {

    $hewan = [
        $_POST['h1'],
        $_POST['h2'],
        $_POST['h3'],
        $_POST['h4'],
        $_POST['h5']
    ];

    echo "<p>Daftar Hewan:</p>";
    echo "<ol>";

    foreach ($hewan as $h) {
        echo "<li>$h</li>";
    }

    echo "</ol>";
}
?>

</body>
</html>