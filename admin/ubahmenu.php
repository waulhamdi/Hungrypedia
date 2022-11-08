<h2> Ubah Menu </h2> 

<?php
	$ambil = $koneksi->query("SELECT * FROM Menu WHERE Id_Menu='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Menu</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['Nama_Menu']; ?>">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['Harga_Menu']; ?>">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" name="stok" class="form-control" value="<?php echo $pecah['Stok_Menu']; ?>">
	</div>
	<div class="form-group">
		<img src="../images/<?php echo $pecah['Foto_Menu'] ?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10">
			<?php echo $pecah['Deskripsi_Menu']; ?>
		</textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
	
</form>

<?php
	if (isset($_POST['ubah']))
	{
		$namafoto = $_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		//jika foto dirubah
		if (!empty($lokasifoto))
		{
			move_uploaded_file($lokasifoto, "../Foto_Menu/$namafoto");
			
			$koneksi->query("UPDATE Menu SET 
			Nama_Menu='$_POST[nama]',Harga_Menu='$_POST[harga]',Stok_Menu='$_POST[stok]',Foto_Menu='$namafoto',
			Deskripsi_Menu='$_POST[deskripsi]' WHERE Id_Menu='$_GET[id]'");
		}
		else
		{
			$koneksi->query("UPDATE Menu SET 
			Nama_Menu='$_POST[nama]',Harga_Menu='$_POST[harga]',Stok_Menu='$_POST[stok]',
			Deskripsi_Menu='$_POST[deskripsi]' WHERE Id_Menu='$_GET[id]'");
		}
		echo "<script>alert('Data produk telah diubah');</script>";
		echo "<script>location='index.php?halaman=Menumakanan';</script>";
	}
?>







