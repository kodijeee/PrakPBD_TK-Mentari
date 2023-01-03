<<?php include 'config.php';


$hasil = mysqli_query($connect, "UPDATE pembayaran
                                 SET status_bayar = '1'
                                 WHERE no_bayar = '".$_GET['id']."'");
	
	
if ($hasil) {
    echo "<script> alert('Verifikasi berhasil!');</script>";
    echo "<script>location ='data-pembayaran.php'</script>";
} else {
    echo "<script> alert('Verifikasi gagal!');</script>";
    echo "<script>location ='verifikasi-pembayaran.php'</script>";
}

?>