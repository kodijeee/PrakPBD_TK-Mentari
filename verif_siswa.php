<<?php include 'config.php';


$sql = mysqli_query($connect, "UPDATE siswa
                               SET status_regis = '1'
                               WHERE noinduk_siswa = '".$_GET['id']."'");
	
	
if ($sql) {
    echo "<script> alert('Verifikasi berhasil!');</script>";
    echo "<script>location ='data-registrasi.php'</script>";
} else {
    echo "<script> alert('Verifikasi gagal!');</script>";
    echo "<script>location ='registrasi-siswa.php'</script>";
}

?>