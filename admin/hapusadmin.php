
<?php

	$ambil = $koneksi->query("SELECT * FROM admin WHERE Id_Admin='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	
	
	$koneksi->query("DELETE FROM admin WHERE Id_Admin='$_GET[id]'");
	
	echo "<script>alert('Admin Terhapus ');</script>";
	echo "<script>location='index.php?halaman=Admin';</script>";
	
?>