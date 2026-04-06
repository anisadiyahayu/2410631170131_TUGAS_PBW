<?php

if(isset($_POST['ajax'])){
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $ukt = str_replace(['Rp.', ' ', '.'], '', $_POST['ukt']);

    $diskon = 0;

    if($ukt >= 5000000){
        $diskon = 0.10;
        if($semester > 8){
            $diskon = 0.15;
        }
    }

    $total = $ukt - ($ukt * $diskon);

    echo json_encode([
        "npm" => $npm,
        "nama" => $nama,
        "prodi" => $prodi,
        "semester" => $semester,
        "ukt" => number_format($ukt,0,',','.'),
        "diskon" => $diskon * 100,
        "total" => number_format($total,0,',','.')
    ]);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task PBW 6 - Diskon UKT</title>

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-body">

            <h3 class="text-center mb-4">💳 Form Pembayaran UKT</h3>

            <form id="formUKT">
                <input type="text" name="npm" class="form-control mb-2" placeholder="NPM" required>
                <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
                <input type="text" name="prodi" class="form-control mb-2" placeholder="Prodi" required>
                <input type="number" name="semester" class="form-control mb-2" placeholder="Semester" required>

                <input type="text" id="ukt" name="ukt" class="form-control mb-3" placeholder="Rp. 0" required>

                <button type="submit" class="btn btn-success w-100">Hitung</button>
            </form>

            <!-- HASIL -->
            <div id="hasil" class="mt-4 d-none">
                <div class="alert alert-info">
                    <h5>📊 Laporan</h5>
                    <p id="out"></p>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
// FORMAT RUPIAH
document.getElementById("ukt").addEventListener("input", function(e) {
    let value = e.target.value.replace(/[^0-9]/g, "");
    let formatted = new Intl.NumberFormat("id-ID").format(value);
    e.target.value = value ? "Rp. " + formatted : "";
});


document.getElementById("formUKT").addEventListener("submit", function(e){
    e.preventDefault();

    let formData = new FormData(this);
    formData.append("ajax", true);

    fetch("", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("hasil").classList.remove("d-none");

        document.getElementById("out").innerHTML = `
            NPM: ${data.npm} <br>
            Nama: ${data.nama} <br>
            Prodi: ${data.prodi} <br>
            Semester: ${data.semester} <br>
            Biaya UKT: Rp ${data.ukt} <br>
            Diskon: ${data.diskon}% <br>
            <b>Total Bayar: Rp ${data.total}</b>
        `;
    });
});
</script>

</body>
</html>