<?php
	session_start();
	$Id_Menu = $_GET["id"];
	unset($_SESSION["keranjang"][$Id_Menu]);
	
	echo "<script>alert('Menu dari keranjang dihapus');</script>";
	echo "<script>location='keranjang.php';</script>";
?>