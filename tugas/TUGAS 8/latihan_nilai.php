<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nama = htmlspecialchars($_POST['nama']);
    $nilai = $_POST['nilai'];
    $predikat = " ";
    $status = " ";

    if(!empty($nama))
    {
        if($nilai >= 85 && $nilai <= 100)
        {
            $predikat = "A";
        }
        else if($nilai >= 75 && $nilai < 85)
        {
            $predikat = "B";
        }
        else if($nilai >= 60 && $nilai < 75 )
        {
            $predikat = "C";
        }
        else if($nilai >= 50 && $nilai < 60)
        {
            $predikat = "D";
        }
        else if($nilai >= 0 && $nilai < 50)
        {
            $predikat = "E";
        }
        else
        {
            $predikat = "Tidak Valid";
        }

        if (in_array($predikat, ["A", "B", "C"]))
        {
            $status = "Lulus";
        }
        else if(in_array($predikat, ["D", "E"]))
        {
            $status = "Tidak Lulus";
        }
        else
        {
            $status = "-";
        }

        echo "<hr>";
        echo "Nama : $nama <br>";
        echo "Nilai : $nilai <br>";
        echo "Predikat : $predikat <br>";
        echo "Status : $status <br>"; 

        echo "<br>";
    }
    else
    {
        echo "Nama tidak boleh kosong";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Latihan Nilai</title>
    </head>
<body>
<form method="post" action="">
    Nama: <input type="text" name="nama"><br>
    Nilai: <input type="number" step="any" name="nilai"><br>
    <input type="submit" value="Proses">
</form>
</body>
</html>
