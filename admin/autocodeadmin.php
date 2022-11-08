<?php include 'koneksi.php'; ?>
<?php
$query = "SELECT max(Id_Admin) as maxKode FROM admin";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$idadmin = $data['maxKode'];
$noUrut = (int) substr($idadmin, 3, 3);
$noUrut++;
$char = "ADM";
$idadmin = $char . sprintf("%03s", $noUrut);
echo $idadmin;
?>