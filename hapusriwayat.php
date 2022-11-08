
<?php
	include 'koneksi.php';

	$ambil = $koneksi->query("SELECT * FROM pemesanan WHERE Id_Pemesanan='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	
	
	$koneksi->query("DELETE FROM pemesanan WHERE Id_Pemesanan='$_GET[id]'");
	
	echo "<script>alert('Riwayat terhapus Terhapus');</script>";
	echo "<script>location='index.php?halaman=Member';</script>";
	
?>