<?php
	session_start();
	include 'koneksi.php';
	
	//tolak akses jika tidak login
	if (!isset($_SESSION["Member"]) OR empty($_SESSION["Member"]))
	{
		echo "<script>alert('akses ditolak, silahkan login terlebih dahulu');</script>";
		echo "<script>location='login.php';</script>";
	}
	$Id_Pemesanan = $_GET['id'];
	
	$ambil = $koneksi->query("SELECT * FROM Pembayaran LEFT JOIN Pemesanan ON Pembayaran.Id_Pemesanan=Pemesanan.Id_Pemesanan 
	WHERE Pemesanan.Id_Pemesanan='$Id_Pemesanan'");
	$detbay = $ambil->fetch_assoc();
	
	if (empty($detbay))
	{
		echo "<script>alert('anda melum menyelesaikan tagihan');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();
	}
	
	//data pembayar tidak sesuai dengan pelanggan yg login
	if($_SESSION["Member"]["Id_Member"]!==$detbay["Id_Member"])
	{
		echo "<script>alert('Akses ditolak, dilarang mengakses data orang lain');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>HungrypediaGalaxy.com</title>
	<link href="admin/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<?php include 'menutanpapencarian.php'; ?>
	<div class="container">
		<h2>Lihat Pembayaran</h2>
		<div class="row">
			<div class="col-md-3">
				<img src="bukti_pembayaran/<?php echo $detbay["Bukti"] ?>" alt="" class="img-responsive" >
			</div>
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>Nama</th>
						<td><?php echo $detbay["Nama_Penyetor"] ?></td>
					</tr>
					<tr>
						<th>Bank</th>
						<td><?php echo $detbay["Bank"] ?></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><?php echo $detbay["Tanggal"] ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo number_format($detbay["Jumlah"]) ?></td>
					</tr>
				</table>
			</div>
			
		</div>
	</div>
</body>
</html>