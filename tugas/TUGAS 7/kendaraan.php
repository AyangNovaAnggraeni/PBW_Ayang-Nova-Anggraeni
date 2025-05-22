<?php
$jumlah_roda = 5; 
echo $jumlah_roda. "<br>";

switch ($jumlah_roda) {
    case 2:
        echo "Jenis kendaraan: Sepeda motor atau sepeda.";
        break;
    case 3:
        echo "Jenis kendaraan: Bajaj atau motor roda tiga.";
        break;
    case 4:
        echo "Jenis kendaraan: Mobil.";
        break;
    case 6:
        echo "Jenis kendaraan: Truk kecil.";
        break;
    case 12:
        echo "Jenis kendaraan: Truk besar atau kendaraan berat.";
        break;
    default:
        echo "Jenis kendaraan tidak diketahui.";
        break;
}
?>

