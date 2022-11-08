<?php
	session_start();
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bubur Bayi</title>
	<link href="admin/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body style="background:url(image/backlogin.jpg);background-size:cover">

	<script>
			function myFunction() {
  			var x = document.getElementById("myInput");
 			 if (x.type === "password") {
   			 x.type = "text";
 				 } else {
   							 x.type = "password";
  													}
			}
		</script>
 <div>
 	&nbsp;
 </div>
  <div>
 	&nbsp;
 </div>
  <div>
 	&nbsp;
 </div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<center>
							<a href="index.php"><img src="image/Logohungrypediagalaxy.png" style="height:80%; width:50%;"></a>
						</center>
						<h3 class="panel-title" style="text-align: center">Login Member</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password" id="myInput">
							</div>
							<div>
								<input type="checkbox" onclick="myFunction()"> &nbsp;Show Password
							</div>
							<div>
								&nbsp;
							</div>
							<button class="btn btn-primary" name="masuk">Masuk</button>
							&nbsp; Belum punya akun ? <a href="daftar.php">Daftar Member</a>
							
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	//jika tombol masuk ditekan
	if (isset($_POST["masuk"]))
	{
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		//cek akun di database
		$ambil = $koneksi->query("SELECT * FROM member WHERE Email_Member='$email' AND Password_Member='$password'");
		
		//hitung akun yang cocok
		$akunyangcocok = $ambil->num_rows;
		
		//jika 1 akun yang cocok, maka bisa masuk
		if ($akunyangcocok==1)
		{
			//sukses login
			//akun dalam bentuk array
			$akun = $ambil->fetch_assoc();
			//simpan di session pelanggan
			$_SESSION["Member"] = $akun;
			echo "<script>alert('Login sukses');</script>";
			
			//jika sudah belanja
			if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
			{
				echo "<script>location='checkout.php';</script>";
			}
			//jika belum
			else
			{
				echo "<script>location='index.php';</script>";
			}
		}
		else
		{
			//gagal login
			echo "<script>alert('Gagal masuk, periksa kembali akun anda');</script>";
			echo "<script>location='login.php';</script>";
		}
	}
	?>
	
</body>
</html>