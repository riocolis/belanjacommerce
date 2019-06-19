<?php
	session_start(); 
	include'koneksi.php';
	$id_produk=$_GET["id"];
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
		<div class="container">
			<?php
				$result=$koneksi->query("SELECT * FROM produk where id='$id_produk'");
				while($produk = mysqli_fetch_assoc($result)){
				?>
				<div class="row">
				<div class="col-sm-12">
				<form method="post">
					<div class="features_items">
					<br /><br />
						<div class="col-sm-4 float-left">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/gambar/<?php echo $produk['gambar'] ?>"></img>
									</div>
								</div>
							</div>
						</div>
							<div class="container">
							<h1><?php echo $produk['nama'];?><span class="badge badge-light"></span></h1>
							<h3><?php echo $produk['jenis'];?></h3>
							<h5>Harga (Rp)</h5>
							<h3><?php echo number_format($produk['harga']);?></h3>
							<br/>
								<div class="form-group">
									Masukan Jumlah Barang :(Min 1)<br />
									<input class="number1"type="number" name="jumlah" min="1" /><br /><br /><br />
								</div>
								<button class="btn btn-secondary text-light" name="beli">Masuk Keranjang</button>
							</div>
						</form>
						</div>
					</div>
					<h10> 
Menyediakan :<br>
Kaos - Kemeja - Dress <br>
<br>
<?php echo $produk['nama']; ?><br>
- ketebalan 24s<br>
- 100% Cotton<br>
- Ketebalan bahan seperti katun Lemes dan lembut<br>
- Tanpa jahitan samping<br>
- Sangat cocok untuk anak hits<br>
- Nyaman dipakai saat santai<br>
<br>
Ukuran:<br>
ALL SIZE (Lebar 51 cm x Tinggi 74 cm)<br>
<br><br>
HARAP DIPERHATIKAN :<br>
Warna bahan sudah sesuai dengan warna aslinya. Apabila terdapat perbedaan, maka itu dikarenakan efek cahaya dan pengaturan monitor yang berbeda pada layar anda.
 </h10>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php 
	if (isset($_POST["beli"])) 
	{
		$jumlah = $_POST["jumlah"];
		if($jumlah==0)
		{
			echo "<script>alert('Jumlah barang tidak boleh kosong!!');</script>";
		}
		else
		{
			$_SESSION["keranjang"][$id_produk]+=$jumlah;
		echo "<script>alert('produk ke keranjang ');</script>";
		echo "<script>location='keranjang.php';</script>";
		}
	}
	 ?>
	</body>
	<footer class="page-footer font-small bg-primary">

		<div class="footer-copyright py-3 text-center">
			<h4>Ini hanya Desain Untuk membuat sebuah Website Saja</h4>	
		</div>
	</footer>
</html>--!>