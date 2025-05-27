<!-- contoh penerapan form -->
<form action="proses.php" method="post">
     <!-- kode proses php -->
</form>


<?php

// contoh penerapan post
$var_nama = $_POST['nama'];
$var_email = $_POST['email'];

// contoh URL menggunakan GETT
http://localhost/?nama=andre&email=gmail

// Superglobal GET untuk mengambil nilai nama dari URL diatas
$var_nama = $_GET['nama'];

// percabangan dalam PHP
$nilai = 75;
if ($nilai >= 80) {
   echo "Nilai A";
} elseif ($nilai >= 70) {
   echo "Nilai B";
} else {
   echo "Nilai C";
}

// contoh implementasi if dua kondisi
$umur = 20;
$ktp = true;
if ($umur >= 17 && $ktp) {
   echo "Boleh memilih";
}

// if untuk filtering data yang kosong
if (!empty($_POST['nama'])) {
    echo "Nama: " . htmlspecialchars($_POST['nama']);
   } else {
    echo "Nama tidak boleh kosong!";
   }
