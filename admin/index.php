<?php
	session_start();
	include 'koneksi.php';
	
	if (!isset($_SESSION['admin']))
	{
		echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		echo "<script>location='login.php';</script>";
		header('location:login.php');
		exit();
	}
	
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
	<title>Bubur Bayi | Admin</title>
	
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    
	<div id="wrapper" style="background-color:silver">
        <?php include 'menu.php'; ?>  
           <!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" style="background-color:silver">
            <div class="sidebar-collapse" style="text-align:center">
				
				<h2 style="color:white"> Nama Admin :<?php echo $_SESSION["admin"]["Nama_Admin"]; ?></h2>
				<h5 style="color:white"> Email Admin : <?php echo $_SESSION["admin"]["Email_Admin"]; ?></h5>
				<div>
					&nbsp;
				</div>
				
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-color:white">
            <div id="page-inner">
                <?php
					if (isset($_GET['halaman']))
					{
						if ($_GET['halaman']=="Menumakanan")
						{
							include 'Menumakanan.php';
						}
						elseif ($_GET['halaman']=="pembelian")
						{
							include 'pembelian.php';
						}
						elseif ($_GET['halaman']=="Admin")
						{
							include 'Admin.php';
						}
						elseif ($_GET['halaman']=="hapusadmin")
						{
							include 'hapusadmin.php';
						}
						elseif ($_GET['halaman']=="tambahadmin")
						{
							include 'tambahadmin.php';
						}
						elseif ($_GET['halaman']=="UbahAdmin")
						{
							include 'UbahAdmin.php';
						}
						elseif ($_GET['halaman']=="Member")
						{
							include 'Member.php';
						}
						elseif ($_GET['halaman']=="tambahmember")
						{
							include 'tambahmember.php';
						}
						elseif ($_GET['halaman']=="hapusmember")
						{
							include 'hapusmember.php';
						}
						elseif ($_GET['halaman']=="ubahmember")
						{
							include 'UbahMember.php';
						}
						elseif ($_GET['halaman']=="detail")
						{
							include 'detail.php';
						}
						elseif ($_GET['halaman']=="tambahmenu")
						{
							include 'tambahmenu.php';
						}
						elseif ($_GET['halaman']=="hapusmenu")
						{
							include 'hapusmenu.php';
						}
						elseif ($_GET['halaman']=="ubahmenu")
						{
							include 'ubahmenu.php';
						}
						elseif ($_GET['halaman']=="pembayaran")
						{
							include 'pembayaran.php';
						}
						elseif ($_GET['halaman']=="laporan_pembelian")
						{
							include 'laporan_pembelian.php';
						}
					}
					else
					{
						include 'home.php';
					}
				?>
			</div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>

</html>
