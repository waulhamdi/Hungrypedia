<?php
	//mendapatkan id_produk dari url
	session_start();
	$Id_Menu = $_GET['id'];
	
	//jika produk sudah ada di keranjang, qty akan bertambah 1
	if (isset($_SESSION['keranjang'][$Id_Menu]))
	{
		$_SESSION['keranjang'][$Id_Menu]+=1;
	}
	//jika produk belum ada di keranjang, produk tsb dibeli 1
	else
	{
		$_SESSION['keranjang'][$Id_Menu] = 1;
	}
	
	//over ke halaman keranjang
	echo "<script>alert('Menu dimasukkan ke keranjang');</script>";
	echo "<script>location='keranjang.php';</script>";
?>