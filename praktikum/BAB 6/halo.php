<?php
    echo "Halo, selamat datang di dunia PHP!";
?>

<?php
    $nama = "Budi";
    $umur = 20;

    // Menampilkan nilai variabel
    echo "Nama: " . $nama . "<br>";
    echo "Umur: " . $umur . " tahun<br>";
?>

<!-- konstanta -->
define("NAMA_KONSTANTA", nilai);

<?php
    define("SITE_NAME", "unsika.ac.id");
    define("VERSION", "1.0");
    echo "Selamat datang di " . SITE_NAME . "<br>";
    echo "Versi Sistem: " . VERSION . "<br>";
?>

<!-- Tipe Data  -->
    <!-- String -->
    <?php
        $nama = "Andi";
        echo "Nama saya adalah". $nama;
    ?>

    <!-- Integer -->
    <?php
        $umur = 25;
        echo "Umur saya". $umur. "tahun";
    ?>

    <!-- Boolean -->
    <?php
        $isLogin = true;
    ?>

    <!-- Array -->
    <?php
        $buah = ["apel", "jeruk", "mangga"];
        echo $buah[1];
    ?>

    <!-- Object -->
    <?php
        class Mahasiswa {
        public $nama;
        public function sapa() 
        {
            return "Halo, saya $this->nama";
        }
        }
        $mhs = new Mahasiswa();
        $mhs->nama = "Jeni";
        echo $mhs->sapa();
    ?>

    <!-- NULL -->
    <?php
        $data = null;
        var_dump($data);
    ?>
