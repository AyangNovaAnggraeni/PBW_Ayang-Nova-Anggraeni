<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $npm = htmlspecialchars($_POST['npm']);
    $nama = htmlspecialchars($_POST['nama']);
    $prodi = htmlspecialchars($_POST['prodi']);  
    $semester = $_POST['semester'];
    $ukt = $_POST['ukt'];
    $diskon = " ";
    $total = " ";

    if(!empty($semester))
    {
        if(!empty($ukt))
        {
            if($ukt >= 5000000 && $semester <= 8)
        {
            $diskon = 0.1;
            $total = $ukt - ($ukt * $diskon);
        }
            else if($ukt >= 5000000 && $semester > 8)
        {
            $diskon = 0.15;
            $total = $ukt - ($ukt * $diskon);
        }
            else
        {
            $diskon = 0;
            $total = $ukt - ($ukt * $diskon);
        }

        echo "<hr>";
        echo "NPM : $npm <br>";
        echo "Nama : $nama <br>";
        echo "Prodi : $prodi <br>";
        echo "Semester : $semester <br>"; 
        echo "Biaya UKT : $ukt <br>";
        echo "Diskon : $diskon <br>";
        echo "Yang harus dibayar : $total <br>";

        echo "<br>";
        }         
    }
    else
    {
        echo "Semester dan UKT tidak boleh kosong";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>UKT</title>
    </head>
<body>
<form method="post" action="">
    NPM: <input type="text" name="npm"><br>
    Nama: <input type="text" name="nama"><br>
    Prodi: <input type="text" name="prodi"><br>
    Semester: <input type="number" name="semester"><br>
    Biaya UKT: <input type="number" name="ukt"><br>
    Diskon: <input type="number" step="any" name="diskon"><br>
    Yang harus dibayar: <input type="number" name="total"><br>
    <input type="submit" value="Proses">
</form>
</body>
</html>
