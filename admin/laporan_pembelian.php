<?php
	$semuadata=array();
	$tgl_mulai="-";
	$tgl_akhir="-";
	
	if (isset($_POST["kirim"]))
	{
		$tgl_mulai = $_POST["tglm"];
		$tgl_akhir = $_POST["tgla"];
		$ambil = $koneksi->query("SELECT * FROM Pemesanan pm LEFT JOIN Member pl ON pm.Id_Member=pl.Id_Member 
									WHERE Tanggal_Pemesanan BETWEEN '$tgl_mulai' AND '$tgl_akhir'");
		while($pecah = $ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
	}
?>


<h2 style="color:black">Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_akhir ?></h2>
<hr>

<form method="post">
	<div class="row">
		<div class="co-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="co-md-5">
			<div class="form-group">
				<label>Tanggal Akhir</label>
				<input type="date" class="form-control" name="tgla" value="<?php echo $tgl_akhir ?>">
			</div>
		</div>
		<div class="co-md-2" style="text-align:left">
			<button class="btn btn-primary" name="kirim">Lihat Laporan</button>
			<button class="btn btn-danger"  onclick="window.print()"><span class="glyphicon glyphicon-print"> </span> &nbsp;Print</button>
		</div>
	</div>
</form>
<div>
	&nbsp;
</div>
<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['Total_Pemesanan'] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["Nama_Member"] ?></td>
			<td><?php echo $value["Tanggal_Pemesanan"] ?></td>
			<td>Rp. <?php echo number_format($value["Total_Pemesanan"]) ?></td>
			<td><?php echo $value["Status_Pemesanan"] ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
		<th colspan="3">Total</th>
		<th>Rp. <?php echo number_format($total) ?></th>
		<th></th>
	</tfoot>
</table>
