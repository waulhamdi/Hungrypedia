<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Hungrypedia | Admin</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Tambah Admin</h3>
					</div>
					
						<form method="post" class="form-horizontal" action="">
							<div class="panel-body">
								<div class="form-group">
								
								<div class="col-md-7">
									<input type="hidden" class="form-control" name="Id_Admin" required minlength="5" readonly="" value="<?php include 'autocodeadmin.php'; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Nama Lengkap</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nama" required minlength="5">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="email" class="form-control" name="email" required minlength="12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="password" required minlength="8">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-9 col-md-offset-10">
									<button class="btn btn-primary" name="daftar">Simpan</button>
								</div>
							</div>
						</form>

						
						
				
						<?php							

							//jika klik daftar
							if (isset($_POST["daftar"]))
							{
								$Id_Admin = $_POST["Id_Admin"];
								//mengambil data dari input
								$nama = $_POST["nama"];
								$email = $_POST["email"];
								$password = $_POST["password"];
								
								//cek apakah email sudah digunakan
								$ambil = $koneksi->query("SELECT * FROM admin WHERE Email_Admin='$email'");
								$yangcocok = $ambil->num_rows;
								
								if ($yangcocok==1)
								{
									echo "<script>alert('Pendaftaran gagal, email sudah digunakan');</script>";
									echo "<script>location='tambahadmin.php';</script>";
								}
								else
								{
									//insert ke tabel admin
									$koneksi->query("INSERT INTO admin (Id_Admin,Nama_Admin,Email_Admin,Password_Admin) VALUES ('$Id_Admin','$nama','$email','$password')");
									
									echo "<script>alert('Pendaftaran sukses, silahkan login');</script>";
									echo "<script>location='index.php?halaman=Admin';</script>";
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