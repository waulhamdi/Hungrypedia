<h2>Tambah Menu </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		
		<input type="hidden" class="form-control" name="Id_Menu" required="" readonly="" value="<?php include 'autocodemenu.php'; ?>">
	</div>
	<div class="form-group">
		<label>Nama Menu</label>
		<input type="text" class="form-control" name="nama" required="">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" required="">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok" required="">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto" required="">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10" required="" minlength="10"></textarea>
	</div>
	
	<button class="btn btn-primary" name="save">Simpan</button>
	
</form>
<?php
	if (isset($_POST['save']))
	{
		$nama = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../Foto_Menu/".$nama);
		$koneksi->query("INSERT INTO menu (Id_Menu,Nama_Menu,Harga_Menu,Stok_Menu,Foto_Menu,Deskripsi_Menu) 
		VALUES ('$_POST[Id_Menu]','$_POST[nama]','$_POST[harga]','$_POST[stok]','$nama','$_POST[deskripsi]')");
		
		echo "<div class='alert alert-info'>Data Tersimpan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=Menumakanan'>";
	}
	
?>