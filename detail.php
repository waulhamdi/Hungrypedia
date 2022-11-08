<?php
	session_start();
	include 'koneksi.php';
?>
<?php
	$Id_Menu = $_GET["id"];
	
	//query ambil data
	$ambil = $koneksi->query("SELECT * FROM Menu WHERE Id_Menu='$Id_Menu'");
	$detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hungrypedia Galaxy</title>
	<link href="admin/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body style="background:url(image/back2.jpg);background-size:cover">
	<?php include 'menutanpapencarian.php'; ?>
	
	<section class="konten">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2><b><?php echo $detail["Nama_Menu"] ?></b></h2>
					<h4><b>Rp. <?php echo number_format($detail["Harga_Menu"]); ?></b></h4>
					<h5><b>Stok : <?php echo $detail['Stok_Menu'] ?></b></h5>
	 				<h5><b>Keterangan : <?php echo $detail["Deskripsi_Menu"]; ?></b></h5>
					<form method="post">
						<div class="form-group">
							<div class="input-group" style="width:100%">
								<input type="number" value="1" min="1" max="<?php echo $detail['Stok_Menu'] ?>" class="form-control" name="Jumlah" style="width:30%">
								&nbsp;
								
								<div>
									&nbsp;
								</div>
								<div>
								<button class="btn btn-primary" name="beli" style="width:30%">Beli</button>
								</div>
							</div>
						</div>
					</form>
					
					<?php
						//jika klik beli
						if (isset($_POST["beli"]))
						{
							//mendapatkan qty
							$Jumlah = $_POST["Jumlah"];
							//masukan ke keranjang
							$_SESSION["keranjang"][$Id_Menu] = $Jumlah;
							
							echo "<script>alert('Pesanan telah ditambahkan ke keranjang');</script>";
							echo "<script>location='keranjang.php';</script>";
						}
					?>
				</div>
				<div class="col-md-5">
					<img src="Foto_Menu/<?php echo $detail["Foto_Menu"]; ?>" alt="" class="img-responsive" style="width: 90%">
				</div>
			</div>
		</div>
	</section>
</body>
</html>