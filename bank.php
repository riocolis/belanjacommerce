<?php 
	session_start();
	include 'koneksi.php';
 ?>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.css">
	<link rel="stylesheet" href="css/bootstrap-reboot-min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/checkOut.css"> 
  
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/mainscript.js"></script>	
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<body>
		<nav class="navbar navbar-inverse navbar-expand-sm bg-dark navbar-dark sticky-top">
			<div class="container-fluid">
				<div class="nav">
					<a href="index.php"><button class="active button2"><a href="index.php">Beranda</a></button></a>
					<div class="dropdown">
					<button class="button2" data-toggle="dropdown">Belanja</button>
					  <ul class="dropdown-menu dropdown2-color">
						<li class="dropdown2-font"><a href="belanja1.php">Kaos</a></li>
						<li class="dropdown2-font"><a href="belanja2.php">Jaket</a></li>
						<li class="dropdown2-font"><a href="belanja3.php">Dress</a></li>
					  </ul>
				</div>
					<a href="keranjang.php"><button class="button2"><a href="keranjang.php">Keranjang</a></button></a>	
				</div>
				<div class="navbar-header">
					<a style="font-size:35px;" class="navbar-brand navbar-dark" href="index.php">TOKO COTTON ON</a>
				</div>
				<div class="nav navbar-nav navbar-right">
					<?php if(isset($_SESSION["pelanggan"])): ?>
						<h5 class="text-light"><?php echo $_SESSION["pelanggan"]["nama"] ?></h5>
						<a href="logout.php" class="text-light">Keluar</a>
					<?php else : ?>
					<a href="login.php" class="text-light">Masuk</a>
					<a href="register.php" class ="text-light">Daftar</a>
					<a href="admin/login.php" class="text-light btn btn-dark">Admin</a>
					<?php endif ?>
				</div>
			</div>
		</nav>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<h2>Konfirmasi Pembayaran</h2>
					<form method="post" enctype="multipart/form-data">
						<label for="fname"><i class="fa fa-user"></i> Nomor Pembelian ke :</label>
						<input type="text" class="form-control" name="pembelian" required/>
						<label for="fname"><i class="fa fa-user"></i> Nama Rekening :</label>
						<input type="text" class="form-control" name="nama" required/>
						<label for="fnomor"><i class="fa fa-user"></i> Nomor Rekening :</label>
						<input type="text" class="form-control" name="nomor" required/>
						<label for="fnamabank"><i class="fa fa-user"></i> Nama Bank :</label>
						<input type="text" class="form-control" name="bank" required/>
						<label for="fnominal"><i class="fa fa-user"></i> Nominal:</label>
						<input type="text" class="form-control" name="nominal" required/>
						<label for="fgambar">Upload Gambar Pembayaran</label>
						<input type="file" class="form-control bg-secondary text-light" name="gambar" />
						<br/>
						<button class="btn btn-default btn-success" name='kirim'>Kirim</button>
					</form>
				</div>
				
			</div>
		</div>
	</body>
	<br>
	<?php 
	if (isset($_POST['kirim'])) 
	{
		$nama=$_FILES['gambar']['name'];
		$lokasi=$_FILES['gambar']['tmp_name'];
		move_uploaded_file($lokasi, "../commerce/admin/bank/".$nama);
		$koneksi->query("INSERT INTO konfirmasi (id_pembelian, nama_bank, nama_rek, no_rek, gambar_rek, nominal) VALUES
		('$_POST[pembelian]','$_POST[bank]','$_POST[nama]','$_POST[nomor]','$nama',$_POST[nominal])");
		echo  "<div class='alert alert-info'>Data Tersimpan</div>";
	}
 ?>
	<!--<pre><?php print_r($_SESSION['pelanggan']) ?></pre>
	<pre><?php print_r($_SESSION['keranjang']) ?></pre>-->
	<!--Footer-->
	<footer class="page-footer font-small bg-primary">

		<div class="footer-copyright py-3 text-center">
			<h4>Ini hanya Desain Untuk membuat sebuah Website Saja</h4>	
		</div>
		<!--/.Copyright-->
	</footer>
	
</html>