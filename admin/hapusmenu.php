<?php
	$ambil = $koneksi->query("SELECT * FROM Menu WHERE Id_Menu='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	$Foto_Menu = $pecah['Foto_Menu'];
	if (file_exists("../Foto_Menu/$Foto_Menu"))
	{
		unlink("../Foto_Menu/$Foto_Menu");
	}
	
	$koneksi->query("DELETE FROM Menu WHERE Id_Menu='$_GET[id]'");
	
	echo "<script>alert('Menu Terhapus');</script>";
	echo "<script>location='index.php?halaman=Menumakanan';</script>";
	
?>