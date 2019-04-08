<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$hak_akses = $data["hak_akses"];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['id_level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses']='admin';
		$_SESSION['id_level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../acp_restoran/admin-tool/index.php");

	// cek jika user login sebagai pegawai
	}else if($data['id_level']=="kasir"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id_level'] = "kasir";
		// alihkan ke halaman dashboard pegawai
		header("location:../acp_restoran/kasir/index.php");

	// cek jika user login sebagai pegawai
	}else if($data['id_level']=="waiter"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id_level'] = "waiter";
		// alihkan ke halaman dashboard pegawai
		header("location:../acp_restoran/waiter/index.php");

	// cek jika user login sebagai pengurus
	}else if($data['id_level']=="owner"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "owner";
		// alihkan ke halaman dashboard pengurus
		header("location:../acp_restoran/owner/index.php");

	// cek jika user login sebagai pengurus
	}else if($data['id_level']=="pelanggan"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pelanggan";
		// alihkan ke halaman dashboard pengurus
		header("location:../acp_restoran/user-tool/index.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>