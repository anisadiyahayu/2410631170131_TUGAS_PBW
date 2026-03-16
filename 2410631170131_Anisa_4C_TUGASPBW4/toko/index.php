<?php

/* ARRAY DATA BARANG */
$barang = [
1 => ["nama"=>"Laptop","harga"=>5000000],
2 => ["nama"=>"Mouse","harga"=>50000],
3 => ["nama"=>"Keyboard","harga"=>150000],
4 => ["nama"=>"Monitor","harga"=>2000000],
5 => ["nama"=>"Printer","harga"=>1200000],
6 => ["nama"=>"Power Supply","harga"=>500000]
];

/* DATA ADMIN */
$admin = [
    "nama"=>"Admin Sistem",
    "email"=>"admin@toko.com",
    "foto"=>"admin.png"
];

?>

<!DOCTYPE html>
<html>
<head>
<title>Sistem Pembelian Barang</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>

body{
height:100vh;
background-image:url("background.jpg");
background-size:cover;
background-position:center;
background-repeat:no-repeat;
display:flex;
align-items:center;
justify-content:center;
font-family:Arial;
}

/* dark overlay */
body::before{
content:"";
position:absolute;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.45);
z-index:-1;
}

/* PROFIL ADMIN */

.admin-profile{
position:absolute;
top:20px;
right:25px;

display:flex;
align-items:center;
gap:10px;

background:rgba(255,255,255,0.2);
padding:8px 12px;
border-radius:50px;

backdrop-filter:blur(10px);
color:white;

cursor:pointer;
transition:0.3s;
}

/* Kombinasi Animasi Hover */

.admin-profile:hover{
transform:translateY(-3px) scale(1.05);
box-shadow:0 8px 20px rgba(0,0,0,0.4);
background:rgba(255,255,255,0.3);
}

/* FOTO ADMIN */

.admin-img{
width:40px;
height:40px;
border-radius:50%;
object-fit:cover;
border:2px solid white;

transition:0.4s;
}

/* FOTO BERPUTAR SAAT HOVER */

.admin-profile:hover .admin-img{
transform:rotate(8deg) scale(1.1);
}

/* INFO ADMIN */

.admin-info{
display:flex;
flex-direction:column;
line-height:1.1;
}

.admin-name{
font-weight:600;
}

.admin-email{
font-size:12px;
opacity:0.85;
}

/* GLASS CARD */

.card{
border-radius:20px;
background:rgba(255,255,255,0.15);
backdrop-filter:blur(15px);
-webkit-backdrop-filter:blur(15px);
border:1px solid rgba(255,255,255,0.3);
box-shadow:0 8px 32px rgba(0,0,0,0.35);

opacity:0;
transform:translateY(40px);
animation:fadeSlide 1s ease forwards;
}

@keyframes fadeSlide{
to{
opacity:1;
transform:translateY(0);
}
}

/* HEADER */

.card-header{
background:rgba(13,110,253,0.6);
backdrop-filter:blur(10px);
border-top-left-radius:20px;
border-top-right-radius:20px;
}

.card-header h4{
margin:0;
font-weight:600;
}

/* FORM */

.form-control,
.form-select{
border-radius:10px;
background:rgba(255,255,255,0.85);
border:none;
transition:0.3s;
}

/* HOVER TEXTBOX */

.form-control:hover,
.form-select:hover{
transform:scale(1.02);
box-shadow:0 0 10px rgba(13,110,253,0.5);
background:white;
}

/* FOCUS (saat diklik) */

.form-control:focus,
.form-select:focus{
transform:scale(1.03);
box-shadow:0 0 12px rgba(13,110,253,0.7);
background:white;
}

/* BUTTON */

.btn-success{
border-radius:10px;
padding:10px;
font-weight:500;
transition:0.3s;
}

.btn-success:hover{
transform:scale(1.05);
box-shadow:0 5px 15px rgba(0,0,0,0.4);
}

/* RIWAYAT BUTTON */

.riwayat-btn{
margin-top:10px;
border-radius:10px;
padding:8px 18px;
transition:0.3s;
}

.riwayat-btn:hover{
transform:translateY(-3px);
box-shadow:0 5px 12px rgba(0,0,0,0.4);
}

/* LOADER */

.loader{
border:6px solid #f3f3f3;
border-top:6px solid #0d6efd;

border-radius:50%;

width:45px;
height:45px;

animation:spin 1s linear infinite;

margin:auto;
}

@keyframes spin{
0%{transform:rotate(0deg);}
100%{transform:rotate(360deg);}
}

</style>
</head>

<body>

<!-- PROFIL ADMIN -->
<div class="admin-profile">

<img src="<?php echo $admin['foto']; ?>" class="admin-img">

<div class="admin-name">
<?php echo $admin['nama']; ?>
</div>

</div>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card">

<div class="card-header text-white text-center">

<h4>🛒 Sistem Pembelian Barang</h4>

</div>

<div class="card-body">

<form action="hasil.php" method="POST" id="formPembelian">

<div class="mb-3">

<label class="form-label text-white">👤 Nama Pembeli</label>

<input type="text"
name="nama_pembeli"
class="form-control"
placeholder="Masukkan nama pembeli"
required>

</div>

<div class="mb-3">

<label class="form-label text-white">📅 Tanggal Pembelian</label>

<input type="date"
name="tanggal"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label text-white">📦 Pilih Barang</label>

<select name="id_barang"
id="barang"
class="form-select"
onchange="ambilBarang()"
required>

<option value="">-- Pilih Barang --</option>

<?php foreach($barang as $id => $b){ ?>

<option value="<?php echo $id; ?>">
<?php echo $b['nama']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label class="form-label text-white">💰 Harga Barang</label>

<input type="text"
id="harga"
class="form-control"
readonly
placeholder="Harga akan muncul otomatis">

</div>

<div class="mb-3">

<label class="form-label text-white">🔢 Jumlah Beli</label>

<input type="number"
name="jumlah"
class="form-control"
placeholder="Masukkan jumlah barang"
required>

</div>

<div class="d-grid">

<button type="submit" class="btn btn-success">

💳 Hitung Pembelian

</button>

</div>

</form>

<hr style="border-color:white;">

<div class="text-center">

<a href="riwayat.php"
class="btn btn-outline-light riwayat-btn">

📋 Lihat Riwayat Pembelian

</a>

</div>

</div>
</div>

</div>

</div>

</div>

<script>

/* DATA BARANG JSON */

let barang = <?php echo json_encode($barang); ?>;

/* DATA ADMIN JSON */

let admin = <?php echo json_encode($admin); ?>;

console.log("DATA ADMIN:", admin);
console.log("DATA BARANG:", barang);

/* AUTO TAMPIL HARGA */

function ambilBarang(){

let id = document.getElementById("barang").value;

if(id==""){
document.getElementById("harga").value="";
return;
}

let harga = barang[id].harga;

let hargaFormat = new Intl.NumberFormat('id-ID').format(harga);

document.getElementById("harga").value = "Rp " + hargaFormat;

}

/* NOTIFIKASI */

document.getElementById("formPembelian").addEventListener("submit", function(e){

e.preventDefault();

let form = this;

Swal.fire({
title:'Memproses Pembelian',
html:'<div class="loader"></div><br>Mohon tunggu...',
showConfirmButton:false,
allowOutsideClick:false
});

setTimeout(function(){

Swal.fire({
title:'Berhasil!',
text:'Data pembelian diproses',
icon:'success'
}).then(()=>{
form.submit();
});

},2000);

});

</script>

</body>
</html>