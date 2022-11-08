<!-- NAVBAR -->
	<?php
		include 'koneksi.php';
		
	?>
	<div class="navbar navbar-default">
		<div class="container-fluid" style="background:black; height:12%; width:100%;">
			<div>
				&nbsp;
			</div>
			<div class="nav navbar-nav">
				<div class="col-md-4" style="text-align-left">
					<a href="index.php"><img src="image/Logohungrypediagalaxy.png" style="height:73%; width:53%;"></a>
				</div>
				<div class="col-md-8" style="text-align:right">
					<?php if (isset($_SESSION["admin"])): ?>
					<a href="index.php" style="color:grey; width:15%" class="btn btn-default"><b>HOME</b></a>
					<a href="index.php?halaman=Admin" style="color:grey; width:15%" class="btn btn-default"><b>
					ADMIN</a>
					<a href="index.php?halaman=Menumakanan" style="color:grey; width:15%" class="btn btn-default"><b>MENU</b></a>
					<a href="index.php?halaman=pembelian" style="color:grey; width:15%" class="btn btn-default"><b>PEMESANAN</b></a>
					<a href="index.php?halaman=Member" style="color:grey; width:15%" class="btn btn-default"><b>MEMBER</a>
					<a href="index.php?halaman=laporan_pembelian" style="color:grey; width:15%" class="btn btn-default"><b>LAPORAN</a>
					<a href="logout.php" s class="btn btn-danger"><span class="glyphicon glyphicon-log-out"> </span></a>
					<?php else: ?>
					&nbsp;
					<?php endif ?>
				</div>
			</div>
			<div>
				&nbsp;
			</div>
		</div>
	</div>