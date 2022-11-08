
<?php

	$ambil = $koneksi->query("SELECT * FROM member WHERE Id_Member='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	
	
	$koneksi->query("DELETE FROM Member WHERE Id_Member='$_GET[id]'");
	
	echo "<script>alert('Member terhapus Terhapus');</script>";
	echo "<script>location='index.php?halaman=Member';</script>";
	
?>