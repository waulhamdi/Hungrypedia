<h2>Detail Pembelian</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM Pemesanan JOIN Member 
	ON Pemesanan.Id_Member=Member.Id_Member 
	WHERE Pemesanan.Id_Pemesanan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong> <?php echo $detail['Nama_Member']; ?> </strong><br>



<div class="row">
	<div class="col-md-4">
		<h1>Pembelian</h1>
		<p>
			Status Pesanan : <?php echo $detail['Status_Pemesanan']; ?><br>
			Tanggal : <?php echo $detail['Tanggal_Pemesanan']; ?><br>
			Total Pembelian : Rp.<?php echo number_format($detail['Total_Pemesanan']); ?> 
		</p>
	</div>
	<div class="col-md-4">
		<h1>Pelanggan</h1>
		<strong><?php echo $detail['Nama_Member']; ?></strong><br>
		<p>
			<?php echo $detail['Telepon_Member']; ?><br>
			<?php echo $detail['Email_Member']; ?>
		</p>
	</div>
	
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th style="text-align:center"> No </th>
			<th style="text-align:center"> Nama Produk </th>
			<th style="text-align:center"> Harga </th>
			<th style="text-align:center"> Jumlah </th>
			<th style="text-align:center"> Total </th>
			
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM Detail_Transaksi JOIN Menu ON Detail_Transaksi.Id_Menu=Menu.Id_Menu 
		WHERE Detail_Transaksi.Id_Pemesanan='$_GET[id]'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['Nama_Menu']; ?></td>
			<td>Rp.<?php echo number_format($pecah['Harga_Menu']); ?></td>
			<td><?php echo $pecah['Jumlah']; ?></td>
			<td>
				Rp.<?php echo number_format($pecah['Harga_Menu']*$pecah['Jumlah']); ?>
			</td>
			
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>