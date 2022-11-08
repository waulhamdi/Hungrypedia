<?php
	session_start();
	include 'koneksi.php';
	
	//tolak akses jika tidak login
	if (!isset($_SESSION["Member"]) OR empty($_SESSION["Member"]))
	{
		echo "<script>alert('akses ditolak, silahkan login terlebih dahulu');</script>";
		echo "<script>location='login.php';</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hungrypedia Galaxy</title>
	<link href="admin/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<?php include 'menutanpapencarian.php'; ?>
	<section class="riwayat">
		<div class="container">
			<h3>Riwayat <?php echo $_SESSION["Member"]["Nama_Member"] ?></h3>
			<table class="table table-bordered">
				<thead>
					<tr style="text-align:center">
						<th style="text-align:center">No</th>
						<th style="text-align:center">Tanggal</th>
						<th style="text-align:center">Status</th>
						<th style="text-align:center">Total</th>
						<th style="text-align:center">Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$nomor=1;
						
						//mendapatkan id_pelanggan
						$Id_Member = $_SESSION["Member"]["Id_Member"];
						$ambil = $koneksi->query("SELECT * FROM Pemesanan WHERE Id_Member='$Id_Member'");
						while($pecah = $ambil->fetch_assoc()){
					?>
					<tr>
						<td style="text-align:center"><?php echo $nomor; ?></td>
						<td style="text-align:center"><?php echo $pecah["Tanggal_Pemesanan"] ?></td>
						<td style="text-align:center">
							<?php echo $pecah["Status_Pemesanan"] ?><br>
							<?php if (!empty($pecah['Status_Pemesanan'])): ?>
							
							<?php endif ?>
						
						</td>
						<td>Rp. <?php echo number_format($pecah["Total_Pemesanan"]) ?></td>
						<td style="text-align:center">
							<a href="nota.php?id=<?php echo $pecah["Id_Pemesanan"] ?>" class="btn btn-info">Nota</a>

							<a href="hapusriwayat.php?id=<?php echo $pecah["Id_Pemesanan"] ?>" class="btn btn-danger"> <span class="glyphicon glyphicon-delete"></span> Hapus </a>


							<?php if($pecah['Status_Pemesanan']=="Pending"):?>
							
							<a href="pembayaran.php?id=<?php echo $pecah["Id_Pemesanan"]; ?>" class="btn btn-success">Input Pembayaran</a>
							
							<?php else: ?>
							
							<a href="lihat_pembayaran.php?id=<?php echo $pecah["Id_Pemesanan"]; ?>" class="btn btn-warning">Lihat Pembayaran</a>
							
							<?php endif ?>

							<?php if($pecah['Status_Pemesanan']=="Pesanan Terverifikasi"):?>
							<a href="Qrcodepesanan.php?id=<?php echo $pecah["Id_Pemesanan"] ?>" class="btn btn-info"> <span class="glyphicon glyphicon-print">&nbsp;No Pesanan</a>
							
							<?php endif ?>
						</td>
					</tr>
					<?php $nomor++; ?>
						<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>