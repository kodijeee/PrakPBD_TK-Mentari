<?php
require_once('config.php');

if(isset($_GET['id_tugasprak'])){

    $query = "DELETE FROM tugas_prakarya
              WHERE id_tugasprak = '".$_GET['id_tugasprak']."'";
    $hapus = mysqli_query($connect, $query);

    if($hapus){
        echo " <script>alert('Data berhasil dihapus!');</script>";
        echo " <script>location='tugas.php';</script>";
    }
    else {
        echo " <script>alert('Data gagal dihapus!');</script>";
    }
}

?>