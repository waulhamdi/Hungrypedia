<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Hungrypedia Galaxy</title>
	<link href="admin/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body style="background:url(image/backlogin.jpg);background-size:cover">
<div> &nbsp;</div><div> &nbsp;</div><div> &nbsp;</div>	
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Daftar Member</h3>
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<div class="col-md-7">
									<input type="hidden" class="form-control" name="Id_Member" required  readonly="" value=<?php include 'autocodedaftar.php'; ?>>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Nama Member</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="email" class="form-control" name="email" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-7">
									<textarea class="form-control" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">No. Telepon</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="telepon" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-9">
									<button class="btn btn-primary" name="daftar">Daftar</button>
									<div> &nbsp;</div>
								</div>
							</div>
						</form>
						<?php
							//jika klik daftar
							if (isset($_POST["daftar"]))
							{
								//mengambil data dari input
								$Id_Member = $_POST["Id_Member"];
								$nama = $_POST["nama"];
								$email = $_POST["email"];
								$password = $_POST["password"];
								$alamat = $_POST["alamat"];
								$telepon = $_POST["telepon"];
								
								//cek apakah email sudah digunakan
								$ambil = $koneksi->query("SELECT * FROM member WHERE Email_Member='$email'");
								$yangcocok = $ambil->num_rows;
								
								if ($yangcocok==1)
								{
									echo "<script>alert('Pendaftaran gagal, email sudah digunakan');</script>";
									echo "<script>location='daftar.php';</script>";
								}
								else
								{
									//insert ke tabel pelanggan
									$koneksi->query("INSERT INTO member (Id_Member,Nama_Member,Email_Member,Password_Member,
														Telepon_Member,Alamat_Member) VALUES ('$Id_Member','$nama','$email','$password','$telepon',
														'$alamat')");
									
									echo "<script>alert('Pendaftaran sukses, silahkan login');</script>";
									echo "<script>location='login.php';</script>";
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>