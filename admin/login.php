
<?php
	session_start();
	//skrip koneksi
	include 'koneksi.php';
?>

<!DOCTYPE html>
<html xnlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Bubur Bayi | Admin</title>
		<!-- BOOTSTRAP STYLES -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES -->
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES -->
		<link href="assets/css/custom.css" rel="stylesheet" />
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body style="background:url(image/backlogin.jpg);background-size:cover">

		<script>
			function myFunction() {
  			var x = document.getElementById("myInput");
 			 if (x.type === "password") {
   			 x.type = "text";
 				 } else { x.type = "password";}
			}
		</script>
		
		<div class="container">
			<div class="row">
				<div>
					&nbsp;
				</div>
				<div class="col-md-4 col-md-offset-4 col-sm-offset-3 col-xs-10 col-xs-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading" style="text-align:center">
							<div>
								<img src="image/Logohungrypediagalaxy.png" style="height:80%; width:50%;">
							</div>
							<div>
							<strong> LOGIN ADMIN </strong>
							</div>
						</div>
						<div class="panel-body">
							<form role="form" method="post" style="text-align:left">
								<br />
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-tag"></i></span>
									<input type="text" class="form-control" name="user" placeholder="Your Email" />
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" class="form-control" name="pass" placeholder="Your Password" id="myInput" />
								</div>
								<div>
								<input type="checkbox" onclick="myFunction()"> &nbsp;Show Password  
								</div>
								<div>
								&nbsp;
								</div>
								<button class="btn btn-primary" name="login" style="width:40%">Login Now</button>
							</form>
							<?php
								if (isset($_POST['login']))
								{
									$ambil = $koneksi->query("SELECT * FROM admin WHERE Email_Admin='$_POST[user]' AND Password_Admin = '$_POST[pass]'");
									$yangcocok = $ambil->num_rows;
									if ($yangcocok==1)
									{
										$_SESSION['admin']=$ambil->fetch_assoc();
										echo "<script>alert('Login sukses');</script>";
										echo "<script>location='index.php';</script>";
									}
									else
									{
										echo "<script>alert('Login Gagal');</script>";
										echo "<script>location='login.php';</script>";
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- SCRIPS .AT THE BOTTOM TO REDUCE THE LOAD TIME -->
		<!-- JQUERY SCRIPTS -->
		<script src="assets/js/jquery-1.10.2.js"></script>
		<!-- BOOTSRAP SCRIPTS -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="assets/js/jquery/metisMenu.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="assets/js/custom.js"></script>
	</body>
</html>