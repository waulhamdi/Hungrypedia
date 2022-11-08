<h2 style="text-align:center;color:black">HALAMAN PEMBELIAN</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th style="text-align:center">No</th>
			<th style="text-align:center">Nama Pelanggan</th>
			<th style="text-align:center">Tanggal</th>
			<th style="text-align:center">Status Pembelian</th>
			<th style="text-align:center">Total</th>
			<th style="text-align:center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM Pemesanan JOIN Member ON Pemesanan.Id_Member=Member.Id_Member"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td style="text-align:center"><?php echo $nomor; ?></td>
			<td><?php echo $pecah['Nama_Member']; ?></td>
			<td><?php echo $pecah['Tanggal_Pemesanan']; ?></td>
			<td><?php echo $pecah['Status_Pemesanan']; ?></td>
			<td>Rp. <?php echo number_format($pecah['Total_Pemesanan']); ?></td>
			<td style="text-align:center">
				<a href="index.php?halaman=detail&id=<?php echo $pecah['Id_Pemesanan']; ?>" class="btn-info btn"><span class="glyphicon glyphicon-eye-open"> </span></a>
				
				<?php if ($pecah['Status_Pemesanan']=="Pending"): ?>

				
				<?php else: ?>

				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['Id_Pemesanan'] ?>" class="btn btn-success"> Verifikasi Pembayaran </a>
				<?php endif ?>
				
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>