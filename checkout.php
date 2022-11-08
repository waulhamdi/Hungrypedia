<?php
	error_reporting(0);
	session_start();
	include 'koneksi.php';
	
	
	//jika belum login
	if (!isset($_SESSION["Member"]))
	{
		echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
		echo "<script>location='login.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hungrypedia Galaxy.com</title>
	<link href="admin/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<?php include 'menutanpapencarian.php'; ?>
	
	<section class="konten">
		<div class="container">
			<h1>Checkout Belanja</h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Menu</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $totalbelanja = 0; ?>
					<?php foreach ($_SESSION["keranjang"] as $Id_Menu => $jumlah): ?>
					<!-- menampilkan produk yang sedang diperulangkan berdasarkan id -->
					<?php
						$ambil = $koneksi->query("SELECT * FROM Menu WHERE Id_Menu='$Id_Menu'");
						$pecah = $ambil->fetch_assoc();
						$subharga = $pecah["Harga_Menu"]*$jumlah;
					?>
					
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["Nama_Menu"]; ?></td>
						<td>Rp. <?php echo number_format($pecah["Harga_Menu"]); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
					</tr>
					<?php $nomor++; ?>
					<?php $totalbelanja+=$subharga; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja) ?> </th>
					</tr>
				</tfoot>
			</table>
			<form method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["Member"]['Nama_Member'] ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["Member"]['Telepon_Member'] ?>" class="form-control">
						</div>
					</div>
					
				</div>
				<button class="btn btn-primary" name="checkout">Checkout</button>
			</form>
			
			<?php
				if (isset($_POST["checkout"]))
				{
					$Id_Member = $_SESSION["Member"]["Id_Member"];

					$Tanggal_Pemesanan = date("Y-m-d");
					$Total_Pemesanan = $totalbelanja;
					$Status_Pemesanan = "Pending";
					
					//1. menyimpan data ke tabel pembelian
					$koneksi->query("INSERT INTO Pemesanan (Id_Member,Tanggal_Pemesanan,Total_Pemesanan,Status_Pemesanan) 
										VALUES ('$Id_Member','$Tanggal_Pemesanan','$Total_Pemesanan','$Status_Pemesanan')");
					
					//2.mendapatkan id_pembelian terbaru
					$id_Pemesanan_terbaru = $koneksi->insert_id;
					
					foreach ($_SESSION["keranjang"] as $Id_Menu => $jumlah)
					{
							//mendapatkan menu produk berdasarkan id menu
							

							$ambil = $koneksi->query("SELECT * FROM Menu WHERE Id_Menu='$Id_Menu'");
							$Menu = $ambil->fetch_assoc();
							$Nama_Menu = $Menu['Nama_Menu'];
							$Harga_Menu = $Menu['Harga_Menu'];
							$Total = $Menu['Harga_Menu']*$jumlah;
							
							$koneksi->query("INSERT INTO Detail_Transaksi (Id_Pemesanan,Id_Member,Id_Menu,Nama_Menu,Jumlah,Harga_Menu,Total) 
							VALUES ('$id_Pemesanan_terbaru','$Id_Member','$Id_Menu','$Nama_Menu','$jumlah','$Harga_Menu','$Total')");
							
							//update stmok
							$koneksi->query("UPDATE Menu SET Stok_Menu=Stok_Menu -$Jumlah WHERE Id_Menu='$Id_Menu'");
					}
					
					//mengkosongkan keranjang belanja
					unset($_SESSION["keranjang"]);
					
					//Tampilan dialihkan ke halaman nota, nota dari pembelian terbaru
					echo "<script>alert('Pemesanan sukses sukses');</script>";
					echo "<script>location='nota.php?id=$id_Pemesanan_terbaru';</script>";
					
				}
			?>
			
		</div>
	</section>
</body>
</html>