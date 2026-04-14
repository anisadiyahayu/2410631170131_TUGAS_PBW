<?php
$menu = isset($_GET['menu']) ? $_GET['menu'] : 'home';

if (isset($_POST['menu'])) {
    $menu = $_POST['menu'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBW Praktikum 9</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .wrap{
            width: 800px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 8px rgba(0,0,0,0.15);
            border-radius: 8px;
        }
        h2{
            text-align: center;
        }
        .bio{
            background: #f9f9f9;
            border-left: 4px solid #444;
            padding: 10px 15px;
            margin: 20px 0;
        }
        .menu{
            margin-bottom: 20px;
            text-align: center;
        }
        .menu a{
            text-decoration: none;
            display: inline-block;
            margin: 5px;
            padding: 10px 14px;
            background: #444;
            color: white;
            border-radius: 5px;
        }
        .menu a:hover{
            background: #222;
        }
        .isi{
            margin-top: 20px;
            padding: 15px;
            background: #fcfcfc;
            border: 1px solid #ddd;
            border-radius: 6px;
        }
        input[type=text],
        input[type=number]{
            padding: 7px;
            margin-top: 5px;
            margin-bottom: 10px;
            width: 250px;
        }
        button{
            padding: 8px 14px;
            border: none;
            background: #2d6cdf;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover{
            background: #1f4fa8;
        }
    </style>
</head>
<body>

<div class="wrap">
    <h2>PBW Praktikum 9</h2>

    <div class="identitas">
        <p><b>Nama :</b> Anisa Diyah Ayu Lestari </p>
        <p><b>NPM :</b> 2410631170131 </p>
    </div>

    <?php include "menu.php"; ?>

    <div class="isi">
        <?php
        if ($menu == "soal1") {
            include "soal1.php";
        } elseif ($menu == "soal2") {
            include "soal2.php";
        } elseif ($menu == "soal3") {
            include "soal3.php";
        } elseif ($menu == "soal4") {
            include "soal4.php";
        } else {
            echo "<p>Silakan pilih salah satu menu soal di atas.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>