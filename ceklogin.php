<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include ('config.php');

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = (($_POST['password']));

	$cek = mysqli_query($connect, "SELECT * FROM pegawai 
	                               WHERE nip_peg = '" . $username . "' 
								   AND password_peg = '" . $password . "'");
	if (mysqli_num_rows($cek) > 0) {
		$user = mysqli_fetch_assoc($cek);

		$_SESSION['user_logged'] = true;
		$_SESSION['user_name'] = $user['nip_peg'];

		header('location: index.php');
		
	} else {
		echo "<script> alert('Username atau password salah!'); </script>";
		echo "<script> location='login.php'; </script>";
	}
}
?>