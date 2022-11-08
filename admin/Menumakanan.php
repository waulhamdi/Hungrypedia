<h2 style="text-align:center;color:black">HALAMAN MENU</h2>

<a href="index.php?halaman=tambahmenu"><img src="image/Tambah.png" style="height:1.5cm; width:1.5cm;"></a>

<div>
	&nbsp;
</div>
<table class="table table-bordered">
	<thead>
		<tr>
			<th style="text-align:center">No</th>
			<th style="text-align:center">Nama</th>
			<th style="text-align:center">Harga</th>
			<th style="text-align:center">Stok</th>
			<th style="text-align:center">Foto</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM Menu"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td style="text-align:center"><?php echo $nomor; ?></td>
			<td><?php echo $pecah["Nama_Menu"]; ?></td>
			<td>Rp. <?php echo number_format($pecah["Harga_Menu"]); ?></td>
			<td><?php echo $pecah["Stok_Menu"]; ?></td>
			<td style="text-align:center">
				<img src="../Foto_Menu/<?php echo $pecah["Foto_Menu"]; ?>" width="200">
			</td>
			<td style="text-align:center">
				<a href="index.php?halaman=ubahmenu&id=<?php echo $pecah['Id_Menu']; ?>"><img src="image/Ubah.png" style="height:1.5cm; width:1.5cm;"></a>
				
				<a href="index.php?halaman=hapusmenu&id=<?php echo $pecah['Id_Menu']; ?>" onclick="return confirm('Anda yakin mau menghapus Menu ini ?')"><img src="image/Hapus.png" style="height:1.5cm; width:1.5cm;"></a> 
				
				
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>