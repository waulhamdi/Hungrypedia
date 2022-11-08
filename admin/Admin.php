<h2 style="text-align:center;color:black">HALAMAN ADMIN </h2>
<div>&nbsp;</div>
<a href="index.php?halaman=tambahadmin"><img src="image/Tambah.png" style="height:1.5cm; width:1.5cm;"></a>
<div>&nbsp;</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th style="text-align:center">No</th>
			<th style="text-align:center">Nama Admin</th>
			<th style="text-align:center">Email</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM Admin"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td style="text-align:center"><?php echo $nomor; ?></td>
			<td><?php echo $pecah["Nama_Admin"]; ?></td>
			<td><?php echo $pecah["Email_Admin"]; ?></td>
			<td style="text-align:center">
				 

				<a href="index.php?halaman=hapusadmin&id=<?php echo $pecah['Id_Admin']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><img src="image/Hapus.png" style="height:1.5cm; width:1.5cm;"></a> 

			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>