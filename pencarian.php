<?php
	include 'koneksi.php';
	session_start();
?>
<?php
	$keyword = $_GET["keyword"];
	
	$semuadata=array();
	$ambil = $koneksi->query("SELECT * FROM Menu WHERE Nama_Menu LIKE '%$keyword%' OR Deskripsi_Menu LIKE '%$keyword%'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[] = $pecah;
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hungrypedia Galaxy</title>
	<link href="admin/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body style="background:url(image/back2.jpg);background-size:cover">
	<?php include 'menutanpapencarian.php'; ?>
	<div class="container-fluid">
		<h1><?php echo $keyword ?></h1>
		<?php if(empty($semuadata)): ?>
			<div class="alert alert-danger">Menu <sutrong><?php echo $keyword ?></strong> tidak ditemukan</div>
		<?php endif ?>
		
		<div class="row">
		
			<?php foreach ($semuadata as $key => $value): ?>
			
			<div class="col-md-2">
				<div class="thumbnail">
					<a href="detail.php?id=<?php echo $value['Id_Menu']; ?>">
						<img src="Foto_Menu/<?php echo $value['Foto_Menu'];?>" alt="" class="img-responsive">
					</a>
					<div class="caption">
						<h3><?php echo $value['Nama_Menu']; ?></h3>
						<h5>Rp. <?php echo number_format($value['Harga_Menu']); ?></h5>
						<a href="beli.php?id=<?php echo $value['Id_Menu']; ?>" class="btn btn-primary" style="width:100%">Beli</a>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</body>
</html>