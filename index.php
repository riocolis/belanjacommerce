<?php
	session_start(); 
	include'koneksi.php'
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
						<a href="bank.php" class="text-light btn btn-dark">Konfirmasi</a>
						<h5 class="text-light"><?php echo $_SESSION["pelanggan"]["nama"] ?></h5>
						<a href="logout.php" class="text-light btn btn-dark">Keluar</a>
					<?php else : ?>
					<a href="login.php" class="text-light btn btn-dark">Masuk</a>
					<a href="register.php" class ="text-light btn btn-dark">Daftar</a>
					<a href="admin/login.php" class="text-light btn btn-dark">Admin</a>
					<?php endif ?>
				</div>
			</div>
		</nav>
		<section id="sllider">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<a href="belanja1.php"><img class="d-block w-100" width="auto" height="auto"  src="gambr/sll.jpg" alt="First slide"></a>
								</div>
								<div class="carousel-item">
									<a href="belanja1.php"><img class="d-block w-100" width="auto" height="auto"  src="gambr/sld1.jpg" alt="First slide"></a>
								</div>
								<div class="carousel-item">
									<a href="belanja1.php"><img class="d-block w-100" width="auto" height="auto" src="gambr/sld4.jpg" alt="Second slide"></a>
								</div>
								<div class="carousel-item">
									<a href="belanja1.php"><img class="d-block w-100" width="auto" height="auto" src="gambr/sld5.jpg" alt="Five slide"></a>
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="container text-center">    
			<h3>PRODUK KAMI</h3><br>
			<hr />
				<div class="row">
					<?php
					$jumlah=1; 
					$ambil=$koneksi->query("SELECT * FROM produk WHERE jenis='Kaos' "); 
						while(($array=mysqli_fetch_assoc($ambil)) && ($jumlah<=4)){
					?>
					<div class="col-sm-3">
						<div class="container2">
							<a href="detailproduk.php?id=<?php echo $array['id']?>"><img src="admin/gambar/<?php echo $array['gambar']; ?>" class="img-responsive img-fluid" style="width:70%;height:30%" alt="Image"></a></img>
							<a href="detailproduk.php?id=<?php echo $array['id']?>">
								<div class="overlay2">
									<div class="text2">Cotton On <br><?php echo $array['nama']; ?></div>
								</div>
							</a>
						</div>
						<hr/>
					</div>
					<?php $jumlah++;
					} ?>
					 <hr />
				</div>
				<div class="row">
					<?php
					$jumlahjaket=1;
					if($jumlahjaket==1)
					{
						$jumlah=1; 
						$ambil=$koneksi->query("SELECT * FROM produk WHERE jenis='Jaket' "); 
							while(($array=mysqli_fetch_assoc($ambil)) && ($jumlah<=2)){
						?>
						<div class="col-sm-3">
							<div class="container2">
								<a href="detailproduk.php?id=<?php echo $array['id']?>"><img src="admin/gambar/<?php echo $array['gambar']; ?>" class="img-responsive img-fluid" style="width:70%;height:30%" alt="Image"></a></img>
								<a href="detailproduk.php?id=<?php echo $array['id']?>"><div class="overlay2">
									<div class="text2">Cotton On <br><?php echo $array['nama']; ?></div>
									</div>
								</a>
							</div>
							<hr/>
						</div>
						<?php $jumlah++;
						} ?>
					<?php }?>
					<?php 
					$jumlahdress=1;
					if($jumlahdress==1)
					{
						$jumlah=1; 
						$ambil=$koneksi->query("SELECT * FROM produk WHERE jenis='Dress' "); 
							while(($array=mysqli_fetch_assoc($ambil)) && ($jumlah<=2)){
						?>
						<div class="col-sm-3">
							<div class="container2">
								<a href="detailproduk.php?id=<?php echo $array['id']?>"><img src="admin/gambar/<?php echo $array['gambar']; ?>" class="img-responsive img-fluid" style="width:70%;height:30%" alt="Image"></a></img>
								<a href="detailproduk.php?id=<?php echo $array['id']?>"><div class="overlay2">
									<div class="text2">Cotton On <br><?php echo $array['nama']; ?></div>
									</div>
								</a>
							</div>
							<hr/>
						</div>
						<?php $jumlah++;
						} ?>
					<?php }?>

					 <hr />
				</div>
		</div>
		<div class="container">
			<div class="jumbotron">
				<h3 style="text-align: center;"> AYO BELI BELI ONLINE FASHION WANITA DAN PRIA<br><br/></h3>
				<p style="text-align:center;" style="font-family:times new roman;" style= "font-size:100px;">
					Bagi para wanita dan Pria, Anda telah memilih yang tepat. Toko Cotton On hadir untuk memberikan yang terbaik dalam tren fashion wanita atau pria. Kami membawa top brand lokal dan internasional terkemuka supaya Anda selalu memiliki pakaian yang sempurna dimanapun dan kapanpun. Dapatkan inspirasi fashion seperti floral, denim, stripes, dan banyak lagi. Kami menyediakan koleksi terlengkap seperti atasan, bawahan, dress, outerwear, hingga pakaian jumpsuit, agar Anda selalu trendy dan fashionable.<br><br>

					Anda tidak memerlukan alasan lebih untuk berbelanja fashion di Toko Cotton On dan memenuhi segala kebutuhan fashion Anda!<br><br>
				</p>
				<button class="btn btn-info button3"><a href="belanja1.php">Klik Di Sini Untuk Belanja</a></button>
			</div>
		</div>
	</body>	
	<!--Footer-->
	<footer class="page-footer font-small bg-primary">

		<div class="footer-copyright py-3 text-center">
			<h4>Ini hanya Desain Untuk membuat sebuah Website Saja</h4>	
		</div>
		<!--/.Copyright-->
	</footer>
	<?php 
	if (isset($_GET['detailproduk'])) 
	{
		if($_GET['detailproduk']=='detailproduk')
		{
			echo "<script>location='detailproduk.php'</script>";
		}
	} ?>
</html>