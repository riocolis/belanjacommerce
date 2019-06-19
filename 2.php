
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
			<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	?>
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
					<h6 class="text-light"><?php echo $_SESSION['username']; ?>  </h6>
					<a class ="text-light"href="logout.php">LOGOUT</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<?php
				include'koneksi.php';
				$sql = 'SELECT gambar, nama, jenis, harga, id FROM produk WHERE nama="Kaos Abu-Abu INDONESIA"';///
				$result = mysqli_query($koneksi, $sql);
				if($result):
				if(mysqli_num_rows($result)>0):
				while($produk = mysqli_fetch_assoc($result)):
				?>
				<div class="row">
				<div class="col-sm-12">
				<form method="post" action="keranjang.php?action=add&id=<?php echo $produk['id'];?>">
					<div class="features_items">
					<br /><br />
						<div class="col-sm-4 float-left">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="tambah_produk/images/<?php echo $produk['gambar'] ?>"></img>
									</div>
								</div>
							</div>
						</div>
							<div class="container">
							<h1><?php echo $produk['nama']?><span class="badge badge-light"></span></h1>
							<h3><?php echo $produk['jenis']?></h3>
							<h5>Harga (Rp)</h5>
							<h3><?php echo $produk['harga']?></h3>
								<div class="form-group">
								Masukan Jumlah Barang :(Min 1)<br />
									<input class="number1"type="number" name="jumlah" min="1" /><br /><br /><br />
									<!--
									<a href="keranjang.php?id=<?php echo $produk['id'];?> &action=add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukkan ke Keranjang</a>-->
									<input type="submit" name="add_to_cart" class="btn btn-default add-to-cart" value="Add to Cart" />
								</div>
							</div>
						</form>
						</div>
					</div>
					<h10> 
<br> <br> <br> <br> <br> <br> 	Menyediakan :<br>
Kaos - Kemeja - Dress <br>
<br>
Kaos Abu-Abu Indonesia<br>
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


			<?php
		endwhile;
	endif;
endif;
?>
		</div>
	</body>
		Footer
	<footer class="page-footer font-small bg-primary">

		<div class="footer-copyright py-3 text-center">
			<h4>Ini hanya Desain Untuk membuat sebuah Website Saja</h4>	
		</div>
		Copyright
	</footer>
	Footer
</html>--!>