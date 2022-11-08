<h2>Data Pembayaran</h2>

<?php
	//mendapatkan id_pembelian dari urldecode
	$Id_Pemesanan = $_GET['id'];
	
	//mengambil data pembayaran dari id_pembelian
	$ambil = $koneksi->query("SELECT * FROM Pembayaran WHERE Id_Pemesanan='$Id_Pemesanan'");
	$detail = $ambil->fetch_assoc();
?>

<div class="row">
	<div class="col-md-6">
		<img src="../bukti_pembayaran/<?php echo $detail['Bukti'] ?>" alt="" class="img-responsive">
	</div>
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?php echo $detail['Nama_Penyetor'] ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $detail['Bank'] ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td><?php echo number_format($detail['Jumlah']) ?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?php echo $detail['Tanggal'] ?></td>
			</tr>
		</table>
	</div>
	
</div>

<form method="post">
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="">Pilih Status</option>
			<option value="Pesanan Terverifikasi">Pesanan Terverifikasi</option>
			<option value="batal">Dibatalkan</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">PROSES</button>
</form>


<?php
	if (isset($_POST["proses"]))
	{
		
		$status = $_POST["status"];
		$koneksi->query("UPDATE Pemesanan SET Status_Pemesanan='$status' WHERE Id_Pemesanan='$Id_Pemesanan'");
		
		echo "<script>alert('Data pembelian telah diupdate');</script>";
		echo "<script>location='index.php?halaman=pembelian';</script>";
	}
?>





