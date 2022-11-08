<?php 
	session_start();
	include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hungrypedia Galaxy</title>
	<link href="admin/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<?php include 'menutanpapencarian.php'; ?>
	<div>
		&nbsp;
	</div>
	<div>
		&nbsp;
	</div>
	<div>
		&nbsp;
	</div>
	<div>
		&nbsp;
	</div>
	<section class="konten">
		<div class="container">
			<?php
			$ambil = $koneksi->query("SELECT * FROM Pemesanan JOIN Member 
				ON Pemesanan.Id_Member=Member.Id_Member 
				WHERE Pemesanan.Id_Pemesanan='$_GET[id]'");
			$detail = $ambil->fetch_assoc();
			?>
			
			<!--jika pembeli tidak sesuai dengan pelanggan yang login, akses ditolak dan dialihkan ke riwayat.php -->
			<?php
				//mendapatkan id pelanggan yang beli
				$idpelangganyangbeli = $detail["Id_Member"];
				
				//mendapatkan id pelanggan yang login
				$idpelangganyanglogin = $_SESSION["Member"]["Id_Member"];
				
				if ($idpelangganyangbeli!==$idpelangganyanglogin)
				{
					echo "<script>alert('akses ditolak');</script>";
					echo "<script>location='riwayat.php';</script>";
					exit();
				}
			?>
			<center>
			<div class="row">
				<div >
					<strong> <?php echo $detail['Nama_Member']; ?> </strong><br>
					<strong>No. Pemesanan : <?php echo $detail['Id_Pemesanan'] ?></strong><br>
					<img src="image/hungrypedia_galaxy.png" style="height:20%; width:20%;"><br>
					<strong>Status Pemesanan : <?php echo $detail['Status_Pemesanan'] ?></strong><br>
					Tanggal : <?php echo $detail['Tanggal_Pemesanan']; ?><br>
					
					Total : <?php echo number_format($detail['Total_Pemesanan']) ?>
				</div>
			</div>
			
					
			</center>
		<div>
			&nbsp;

		</div>
		<script>
			window.print();

		</script>

	</section>
</body>
</html>