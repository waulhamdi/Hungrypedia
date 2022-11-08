<?php include 'koneksi.php'; ?>
<?php
$query = "SELECT max(Id_Pembayaran) as maxKode FROM Pembayaran";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$idpembayaran = $data['maxKode'];
$noUrut = (int) substr($idpembayaran, 3, 3);
$noUrut++;
$char = "P";
$tgl = date ("Ymd");
$idpembayaran = $char.$tgl. sprintf("%03s", $noUrut);
echo $idpembayaran;
?>