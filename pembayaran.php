<?php
	session_start();
	include 'koneksi.php';
	
	//tolak akses jika tidak login
	if (!isset($_SESSION["Member"]) OR empty($_SESSION["Member"]))
	{
		echo "<script>alert('akses ditolak, silahkan login terlebih dahulu');</script>";
		echo "<script>location='login.php';</script>";
	}
	
	//mendapatkan id_pelanggan dari url
	$idpem = $_GET["id"];
	$ambil = $koneksi->query("SELECT * FROM Pemesanan WHERE Id_Pemesanan='$idpem'");
	$detpem = $ambil->fetch_assoc();
	
	//mendapatkan id_pelanggan yg beli
	$id_Member_beli = $detpem["Id_Member"];
	//mendapatkan id_pelanggan yg login
	$id_Member_login = $_SESSION["Member"]["Id_Member"];
	
	if ($id_Member_login !==$id_Member_beli)
	{
		echo "<script>alert('akses ditolak');</script>";
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
		<h2>Konfirmasi Pembayaran</h2>
		<p>kirim bukti pembayaran anda disini</p>
		<div class="alert alert-info">
			Total tagihan anda <strong>Rp. <?php echo number_format($detpem["Total_Pemesanan"]) ?>
		</div>
		
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="hidden" class="form-control" name="Id_Pembayaran" required="" value=<?php include 'autocodepembayaran.php'; ?>>
			</div>
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" class="form-control" name="Nama_Penyetor" required="">
			</div>
			<div class="form-group">
				<label>Bank</label>
				<select class="form-control" name="Bank" required="">
				<option value="">DAFTAR BANK</option>
				<option value="BANK BNI">BANK BNI</option>
				<option value="BANK BRI">BANK BRI</option>
				<option value="BANK MANDIRI">BANK MANDIRI</option>
		</select>
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="number" class="form-control" name="Jumlah" required="">
			</div>
			<div class="form-group">
				<label>Bukti Transfer</label>
				<input type="file" class="form-control" name="Bukti" required="">
				<p class="text-danger">Foto ber-format JPG maksimal 2MB</p>
			</div>
			<button class="btn btn-primary" name="kirim">KIRIM</button>
		</form>
	</div>
	
	<?php
		//jika klik kirim
		if (isset($_POST["kirim"]))
		{
			//upload foto
			$namabukti = $_FILES["Bukti"]["name"];
			$lokasibukti = $_FILES["Bukti"]["tmp_name"];
			$namafiks = date("YmdHis").$namabukti;
			move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");
			
			
			$Id_Pembayaran = $_POST["Id_Pembayaran"];
			$Nama_Penyetor = $_POST["Nama_Penyetor"];
			$Bank = $_POST["Bank"];
			$Jumlah = $_POST["Jumlah"];
			$Tanggal = date ("Y-m-d");
			
			//simpan data
			$koneksi->query("INSERT INTO pembayaran(Id_Pembayaran,Id_Pemesanan,Nama_Penyetor,Bank,jumlah,Tanggal,Bukti)
								VALUES ('$Id_Pembayaran','$idpem','$Nama_Penyetor','$Bank','$Jumlah','$Tanggal','$namafiks')");
			
			//update status pembelian
			$koneksi->query("UPDATE Pemesanan SET Status_Pemesanan='Sudah kirim pembayaran' WHERE Id_Pemesanan='$idpem'");
			
			echo "<script>alert('Pembayaran Sukses Terimakasi');</script>";
			echo "<script>location='riwayat.php';</script>";
		}
	?>
	
</body>
</html>