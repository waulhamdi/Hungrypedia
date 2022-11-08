<h2> Ubah Data Member </h2> 

<?php
	$ambil = $koneksi->query("SELECT * FROM Member WHERE Id_Member='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Member :</label>
		<input type="text" name="Nama_Member" class="form-control" value="<?php echo $pecah['Nama_Member']; ?>">
	</div>
	<div class="form-group">
		<label>Email Member :</label>
		<input type="text" name="Email_Member" class="form-control" value="<?php echo $pecah['Email_Member']; ?>">
	</div>
	<div class="form-group">
		<label>Telepon Member :</label>
		<input type="text" name="Nama_Admin" class="form-control" value="<?php echo $pecah['Telepon_Member']; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
	<a href="index.php?halaman=Admin" style="color:white; width:10%" class="btn btn-danger"><b>CANCEL</b></a>
</form>

<?php
	if (isset($_POST['ubah']))
	{
		$koneksi->query("UPDATE Member SET 
			Email_Member='$_POST[Email_Member]',Nama_Member='$_POST[Nama_Member]',Telepon_Member='$_POST[Telepon_Member]' WHERE Id_Member='$_GET[id]'");
		
		echo "<script>alert('Data produk telah diubah');</script>";
		echo "<script>location='index.php?halaman=Admin';</script>";
	}
?>







