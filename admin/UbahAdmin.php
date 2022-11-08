<h2> Ubah Data Admin </h2> 

<?php
	$ambil = $koneksi->query("SELECT * FROM Admin WHERE Id_Admin='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Email Admin :</label>
		<input type="text" name="Email_Admin" class="form-control" value="<?php echo $pecah['Email_Admin']; ?>">
	</div>
	<div class="form-group">
		<label>Password Admin :</label>
		<input type="text" name="Password_Admin" class="form-control" value="<?php echo $pecah['Password_Admin']; ?>">
	</div>
	<div class="form-group">
		<label>Nama Admin :</label>
		<input type="text" name="Nama_Admin" class="form-control" value="<?php echo $pecah['Nama_Admin']; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
	<a href="index.php?halaman=Admin" style="color:white; width:10%" class="btn btn-danger"><b>CANCEL</b></a>
</form>

<?php
	if (isset($_POST['ubah']))
	{
		$koneksi->query("UPDATE Admin SET 
			Email_Admin='$_POST[Email_Admin]',Password_Admin='$_POST[Password_Admin]',Nama_Admin='$_POST[Nama_Admin]' WHERE Id_Admin='$_GET[id]'");
		
		echo "<script>alert('Data produk telah diubah');</script>";
		echo "<script>location='index.php?halaman=Admin';</script>";
	}
?>







