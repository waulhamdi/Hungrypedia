<?php include 'koneksi.php'; ?>
<?php
$query = "SELECT max(Id_Member) as maxKode FROM Member";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$idmember = $data['maxKode'];
$noUrut = (int) substr($idmember, 3, 3);
$noUrut++;
$char = "MBR";
$idmember = $char . sprintf("%03s", $noUrut);
echo $idmember;
?>