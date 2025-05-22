<!-- switch -->
<?php
$hari = "jum'at";

switch ($hari) {
   case "Senin":
       echo "Hari pertama kerja!";
       break;
   case "jum'at":
       echo "Solat jumat!";
       break;
   case "Minggu":
       echo "Libur akhir pekan!";
       break;
   default:
       echo "Hari biasa.";
}

echo "<br>";

// for loop
// angka
for ($i = 1; $i <= 5; $i++) {
    echo "Angka ke-”.$i.”<br>";
}

echo "<br>";

// string
$buah = ["Apel", "Jeruk", "Mangga"];
for ($i = 0; $i < count($buah); $i++) {
   echo $buah[$i] . "<br>";
}

echo "<br>";

// while
$nilai = 1;
while ($nilai <= 5) {
   echo "Nilai: ". $nilai ."<br>";
   $nilai++;
}

echo "<br>";

// foreach
$mahasiswa = [
    "10001" => "Andi",
    "10002" => "Budi",
    "10003" => "Citra"
 ];
 foreach ($mahasiswa as $nim => $nama) {
    echo "NIM: ". $nim .", Nama: ". $nama."<br>";
 }

 echo "<br>";

//  ternary operator
$umur = 18;
$status = ($umur >= 17) ? "Dewasa" : "Anak-anak";
echo $status;
 

 

