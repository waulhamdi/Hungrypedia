<!-- NAVBAR -->
	<nav class="navbar navbar-default">
		<div class="container-fluid" style="background:black; height:12%; width:100%;">
			<div class="nav navbar-nav">
				<div>
					&nbsp;
				</div>
				<div class="col-md-4">
					<a href="index.php"><img src="image/Logohungrypediagalaxy.png" style="height:80%; width:50%;"></a>
				</div>
				<div class="col-md-5" style="text-align:right">
					<form action="pencarian.php" method="get" class="navbar-form">
						<a href="keranjang.php"><img src="image/Keranjang.png" style="height:37%; width:7%;"></a>
						<a href="checkout.php"><img src="image/checkout.png" style="height:37%; width:7%;"></a>
						<input type="text" class="form-control" style="width:70%" name="keyword">
						<button class="btn btn-info"> <span class="glyphicon glyphicon-search"></button>
					</form>
					
				</div>
				<div class="col-md-3" style="text-align:right; color:white">
					<!-- Jika sudah login (ada session pelanggan)-->
					<?php if (isset($_SESSION["Member"])): ?>
						<a href="riwayat.php" style="color:white" class="btn btn-info">  <span class="glyphicon glyphicon-shopping-cart"> </span> &nbsp; RIWAYAT </a>
						<a href="logout.php" style="color:white" class="btn btn-danger">  <span class="glyphicon glyphicon-log-out"> </span> &nbsp; LOGOUT</a>
					<!-- blm login -->
					<?php else: ?>
						<a href="login.php" style="color:white" class="btn btn-info">LOGIN</a>
						<a href="daftar.php" style="color:white" class="btn btn-success">DAFTAR</a>
					<?php endif ?>
				</div>
			</div>
			<div>
				&nbsp;
			</div>
		</div>
	</nav>