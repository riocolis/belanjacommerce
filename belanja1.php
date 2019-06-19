<?php 
session_start();
include'koneksi.php';
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
<div class="container">
	<div class="row">
				<div class="col-sm-12">
					<h1>Produk Kaos</h1>
					<hr />
					<div class="features_items">
						<div class="row">
							<?php 
							$ambil=$koneksi->query("SELECT * FROM produk WHERE jenis='kaos'");
								while($array=mysqli_fetch_assoc($ambil)){
							 ?>
							<div class="col-sm-3 float-left">
								<div class="product-image-wrapper">
									<div class="single-products">
											<div class="productinfo text-center">
												<a href="detailproduk.php?id=<?php echo $array['id']?>"><img src="admin/gambar/<?php echo $array['gambar']; ?>" alt="Image" /></a>
												<br /><br />
												<p><a href="detailproduk.php?id=<?php echo $array['id']?>">Cotton On <br><?php echo $array['nama']; ?></a></p>
											</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
				</div>
			</div>
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

</html>