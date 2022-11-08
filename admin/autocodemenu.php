<?php include 'koneksi.php'; ?>
<?php
$query = "SELECT max(Id_Menu) as maxKode FROM menu";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$idmenu = $data['maxKode'];
$noUrut = (int) substr($idmenu, 3, 3);
$noUrut++;
$char = "MNU";
$idmenu = $char . sprintf("%03s", $noUrut);
echo $idmenu;
?>