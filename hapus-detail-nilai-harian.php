<?php
require_once('config.php');

if(isset($_GET['id_kriteria_harian'])){

    $query = "DELETE FROM terdiri
              WHERE id_kriteria_harian = '".$_GET['id_kriteria_harian']."'";
    $hapus = mysqli_query($connect, $query);

    if($hapus){
        echo " <script>alert('Data berhasil dihapus!');</script>";
        echo " <script>location='nilai-harian.php';</script>";
    }
    else {
        echo " <script>alert('Data gagal dihapus!');</script>";
    }
}

?>