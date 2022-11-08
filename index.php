<?php
	session_start();
	include 'koneksi.php';
	
	if (!isset($_SESSION['Member']))
	{
		echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		echo "<script>location='login.php';</script>";
		header('location:login.php');
		exit();
	}
		
?>


<!DOCTYPE html>
<html>
<head>
	<title>Bubur Bayi </title>
	<!-- link untuk memanggil bootsrap-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.min.js"> </script>
	<script src="js/bootstrap.min.js"> </script>
</head>
<body style="background: silver">
	<?php include 'menu.php'; ?>
	<!-- konten -->
	<section class="konten">
		<div class="container-fluid">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- menerjemahkan carousel -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"> </li>
						<li data-target="#carousel-example-generic" data-slide-to="1"> </li>
						<li data-target="#carousel-example-generic" data-slide-to="2"> </li>
					</ol>
					<!-- slide jalan-->
					<div class="carousel-inner" role="llistbox">
						<div class="item active">
							<img src="image/promosi1.png" alt="image1">
							<!-- slide pertama -->
						</div>
						<div class="item">
							<img src="image/promosi2.png" alt="image1">
							<!-- slide kedua -->
						</div>
						<div class="item">
							<img src="image/promosi3.png" alt="image1">
							<!-- slide ketiga -->
						</div>
					</div>
					<!-- Carousel Control -->
					<a class="left carousel-control" href="#carousel-example-generic"  role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"> </span>
						<span class="sr-only"> Previous </span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic"  role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"> </span>
						<span class="sr-only"> Next </span>
					</a>
				</div>
		</div>
		<div class="container-fluid">
			<div class="row" style="text-align:center">
			<div class="col-md-12">
				<div class="alert alert-info">
					<p style="font-size:30px">
						SELAMAT DATANG DI BUBUR BAYI ALBAQIYATUS SHALIHAH  <br>
						
					</p>
					<P>
						<strong>NIKMATI RASANYA DAN RASAKAN KEBAHAGIANNYA</strong>
					</P>
				</div>	
			</div>	
			</div>
		
		<div>
			<img src="image/daftarmenu.png" style="height:20%; width:20%;">
		</div>
			
			<div>
				&nbsp;
			</div>
			<div class="row" style="background:url(image/back2.jpg);background-size:cover">
			<div>
				&nbsp;
			</div>
				<?php $ambil = $koneksi->query("SELECT * FROM menu "); ?>
				<?php while($perproduk = $ambil->fetch_assoc()){ ?>
				
				<div class="col-md-2">
					 
						<div class="thumbnail">
							<a href="detail.php?id=<?php echo $perproduk['Id_Menu']; ?>">
								<img src="Foto_Menu/<?php echo $perproduk['Foto_Menu']; ?>" alt="">
							</a>
							<div class="caption">
								<h6><b><?php echo $perproduk['Nama_Menu']; ?></b></h6>
								<h7>Rp. <?php echo number_format($perproduk['Harga_Menu']); ?></h7>
							<div>
								&nbsp;
							</div>	
								<a href="beli.php?id=<?php echo $perproduk['Id_Menu']; ?>" class="btn btn-primary" style="width:100%"> <span class="glyphicon glyphicon-shopping-cart"> </span> &nbsp; Beli</a>
							</div>
						</div>
					
				</div>
			
				<?php } ?>
			
			</div>
		</div>
	</section>
</body>
</html>