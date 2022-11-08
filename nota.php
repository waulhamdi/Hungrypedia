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
	
	<section class="konten">
		<div class="container">
			<h2>Detail Pembelian</h2>

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
			
			<div class="row">
				<div class="col-md-4">
					<h3>Pemesanan</h3>
					<?php if($detail['Status_Pemesanan']=="Pesanan Terverifikasi"):?>
					<strong>No. Pemesanan : <?php echo $detail['Id_Pemesanan'] ?></strong><br>
					Tanggal : <?php echo $detail['Tanggal_Pemesanan']; ?><br>
					Total : <?php echo number_format($detail['Total_Pemesanan']) ?><br>
					Status Pemesanan : <?php echo ($detail['Status_Pemesanan']) ?>
					<?php else: ?>
					<h1>Belum Terverifikasi</h1>
					<?php endif ?>

				</div>
				<div class="col-md-4">
					<h3>Pelanggan</h3>
					<strong> <?php echo $detail['Nama_Member']; ?> </strong><br>
					<p>
						<?php echo $detail['Telepon_Member']; ?><br>
						<?php echo $detail['Email_Member']; ?>
					</p>
				</div>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th> No </th>
						<th> Nama Produk </th>
						<th> Harga </th>
						<th> Jumlah </th>
						<th> Total </th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM Detail_Transaksi WHERE Id_Pemesanan='$_GET[id]'"); ?>
					<?php while($pecah = $ambil->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['Nama_Menu']; ?></td>
						<td>Rp.<?php echo number_format($pecah['Harga_Menu']); ?></td>
						<td><?php echo $pecah['Jumlah']; ?></td>
						<td>Rp. <?php echo number_format($pecah['Total']); ?></td>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
			<center>
					<img src="image/bni.jpg" style="height:20%; width:20%;">
			</center>
		<div>
		<div>
			&nbsp;
		</div>

		</div>
		<div class="row" style="text-align:center">
			<div class="col-md-12">
				<div class="alert alert-info">
					<p>
						Silahkan melakukan pembayaran senilai Rp. <?php echo number_format($detail['Total_Pemesanan']); ?> ke <br>
						<strong> Silakan Melakukan Pembayaran Ke bank ...... </dtrong>
					</p>
				</div>
				<div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
			</div>
		</div>
	</section>
</body>
</html>