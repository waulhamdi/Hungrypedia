<?php
	error_reporting(0);
	session_start();
	include 'koneksi.php';
	
	if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
	{
		echo "<script>alert('Keranjang kosong, silahkan berbelanja');</script>";
		echo "<script>location='index.php';</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hungrypedia Galaxy</title>
	<link href="admin/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<?php include 'menu.php'; ?>
	
	<section class="konten">
		<div class="container">
			<h1>Keranjang Belanja</h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Menu</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php foreach ($_SESSION["keranjang"] as $Id_Menu => $jumlah): ?>
					<!-- menampilkan produk yang sedang diperulangkan berdasarkan id -->
					<?php
						$ambil = $koneksi->query("SELECT * FROM menu WHERE Id_Menu='$Id_Menu'");
						$pecah = $ambil->fetch_assoc();
						$subharga = $pecah["Harga_Menu"]*$jumlah;
					?>
					
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["Nama_Menu"]; ?></td>
						<td>Rp. <?php echo number_format($pecah["Harga_Menu"]); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $Id_Menu ?>" class="btn btn-danger btn-xs">Hapus</a>
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-default"> Lanjutkan Belanja</a>
			<a href="checkout.php" class="btn btn-primary"> Checkout</a>
		</div>
	</section>
</body>
</html>