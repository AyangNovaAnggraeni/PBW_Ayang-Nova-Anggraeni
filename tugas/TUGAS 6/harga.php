<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Total Pembelian</title>
    <style>
        .box {
            border: 1px solid black;
            padding: 20px; 
            width: fit-content;
        }
        .title {
            font-weight: bold;
            font-size: 20px;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
// Konstanta pajak
define("PAJAK", 0.10);

// Array harga barang
$hargaBarang = [
    "Keyboard" => 150000
];

// Variabel jumlah beli
$jumlahBeli = 2;

// Ambil nama barang dan harga satuannya
$namaBarang = "Keyboard";
$hargaSatuan = $hargaBarang[$namaBarang];

// Hitung total harga sebelum pajak
$totalSebelumPajak = $hargaSatuan * $jumlahBeli;

// Hitung pajak
$pajak = $totalSebelumPajak * PAJAK;

// Hitung total akhir
$totalBayar = $totalSebelumPajak + $pajak;
?>

<div class="box">
    <div class="title">Perhitungan Total Pembelian (Dengan Array)</div>
    <hr>
    <p>Nama Barang: <?= $namaBarang ?></p>
    <p>Harga Satuan: Rp <?= number_format($hargaSatuan, 0, ',', '.') ?></p>
    <p>Jumlah Beli: <?= $jumlahBeli ?></p>
    <p>Total Harga (Sebelum Pajak): Rp <?= number_format($totalSebelumPajak, 0, ',', '.') ?></p>
    <p>Pajak (10%): Rp <?= number_format($pajak, 0, ',', '.') ?></p>
    <p class="total">Total Bayar: <span style="color: black;">Rp <?= number_format($totalBayar, 0, ',', '.') ?></span></p>
</div>

</body>
</html>
