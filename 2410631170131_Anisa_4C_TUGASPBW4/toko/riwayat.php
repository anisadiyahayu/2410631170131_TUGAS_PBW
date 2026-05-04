<?php
include "koneksi.php";
$data = mysqli_query($conn,"SELECT * FROM transaksi");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Pembelian</title>
<style>
table{
border-collapse:collapse;
width:90%;
}

table,th,td{
border:1px solid black;
padding:8px;
}

.btn-kembali{
display:inline-block;
padding:8px 15px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:5px;
font-family:Arial;
}

.btn-kembali:hover{
background:#0b5ed7;
}

</style>
</head>

<body>

<h2>Data Transaksi Pembelian</h2>

<table>

<tr>
<th>No</th>
<th>Nama Pembeli</th>
<th>Tanggal</th>
<th>Barang</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Total</th>
<th>Pajak</th>
<th>Total Bayar</th>
</tr>

<?php
$no=1;
while($d=mysqli_fetch_array($data)){
?>

<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $d['nama_pembeli']; ?></td>
<td><?php echo $d['tanggal']; ?></td>
<td><?php echo $d['nama_barang']; ?></td>
<td>Rp <?php echo number_format($d['harga'],0,",","."); ?></td>
<td><?php echo $d['jumlah']; ?></td>
<td>Rp <?php echo number_format($d['total'],0,",","."); ?></td>
<td>Rp <?php echo number_format($d['pajak'],0,",","."); ?></td>
<td>Rp <?php echo number_format($d['total_bayar'],0,",","."); ?></td>
</tr>

<?php } ?>

</table>

<br><br>

<div style="width:90%;">

<a href="index.php" class="btn-kembali">Kembali</a>

</div>

</body>
</html>
 
</body>

</html>