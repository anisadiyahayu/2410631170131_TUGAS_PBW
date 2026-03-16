<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include "koneksi.php";

define("PAJAK",0.10);

/* ARRAY DATA BARANG */
$barang = [
1 => ["nama"=>"Laptop","harga"=>5000000],
2 => ["nama"=>"Mouse","harga"=>50000],
3 => ["nama"=>"Keyboard","harga"=>150000],
4 => ["nama"=>"Monitor","harga"=>2000000],
5 => ["nama"=>"Printer","harga"=>1200000]
];

$nama_pembeli = $_POST['nama_pembeli'];
$tanggal = $_POST['tanggal'];
$id = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];

/* AMBIL DATA BARANG DARI ARRAY */
$nama = $barang[$id]['nama'];
$harga = $barang[$id]['harga'];

/* HITUNG TOTAL */
$total = $harga * $jumlah;
$pajak = $total * PAJAK;
$total_bayar = $total + $pajak;

/* SIMPAN KE DATABASE */
mysqli_query($conn,"INSERT INTO transaksi 
(nama_pembeli,tanggal,id_barang,nama_barang,harga,jumlah,total,pajak,total_bayar)
VALUES
('$nama_pembeli','$tanggal','$id','$nama','$harga','$jumlah','$total','$pajak','$total_bayar')
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Hasil Pembelian</title>

<style>

body{
font-family:Arial;
background:#f5f5f5;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.box{
border-radius:10px;
background:white;
width:450px;
padding:25px;
box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

h2{
text-align:center;
}

.total{
font-size:18px;
font-weight:bold;
color:green;
}

.btn{
display:inline-block;
padding:10px 15px;
margin-top:10px;
text-decoration:none;
border-radius:5px;
background:#0d6efd;
color:white;
}

.btn:hover{
background:#0b5ed7;
}

</style>

</head>
<body>

<div class="box">

<h2>Perhitungan Total Pembelian (Dengan Array)</h2>
<hr>

Nama Pembeli : <?php echo $nama_pembeli; ?> <br><br>

Tanggal Pembelian : <?php echo $tanggal; ?> <br><br>

Nama Barang : <?php echo $nama; ?> <br><br>

Harga Satuan : Rp <?php echo number_format($harga,0,",","."); ?> <br><br>

Jumlah Beli : <?php echo $jumlah; ?> <br><br>

Total Harga : Rp <?php echo number_format($total,0,",","."); ?> <br><br>

Pajak (10%) : Rp <?php echo number_format($pajak,0,",","."); ?> <br><br>

<div class="total">
Total Bayar : Rp <?php echo number_format($total_bayar,0,",","."); ?>
</div>

<br>

<a href="index.php" class="btn">Kembali</a>
<a href="riwayat.php" class="btn">Lihat Riwayat</a>

</div>

</body>
</html>